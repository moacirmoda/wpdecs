<?php

function get_descriptors_by_words($words, $lang){

    $definition_len = 100;

    if(empty($lang)) {
        $lang = $this->language;
    }

    $xmlFile = get_descriptors_from_decs( 'http://decs.bvsalud.org/cgi-bin/mx/cgi=@vmx/decs/?words=' . urlencode($words) . "&lang=" . $lang ); 

    $xmlTree = $xmlFile->xpath("/decsvmx/decsws_response");

    $descriptors = array();

    foreach($xmlTree as $node){

        $definition = "";
        if(!empty((string) $node->record_list->record->definition->occ['n']))
            $definition = (string) $node->record_list->record->definition->occ['n'];

        if(strlen($definition) >= $definition_len) {
            $definition = substr($definition, 0, $definition_len-3) . "...";
        }
        
        $descriptors[(string) $node->tree->self->term_list->term] = array(
            'tree_id' => (string) $node['tree_id'], 
        );        
        
        foreach($node->record_list->record->synonym_list->synonym as $synonym) {
            $descriptors[ (string) $synonym  ] = array(
                'tree_id' => (string) $node['tree_id'],
                'definition' => $definition,
            );
        }
    }

    return array('descriptors'=>$descriptors);

}

function get_descriptors_by_tree_id($treeId, $lang){

    if(empty($lang)) {
        $lang = $this->language;
    }

    $descriptors = array(); 

    $result = array();

    $xmlFile = get_descriptors_from_decs( 'http://decs.bvsalud.org/cgi-bin/mx/cgi=@vmx/decs?tree_id=' . $treeId . "&lang=" . $lang );

    $term = $xmlFile->xpath("/decsvmx/decsws_response/tree/self/term_list[@lang='".$lang."']/term");
    $definition = $xmlFile->xpath("/decsvmx/decsws_response/record_list/record/definition/occ/@n");
    $descendants = $xmlFile->xpath("/decsvmx/decsws_response/tree/descendants/term_list[@lang='".$lang."']/term");

    foreach($descendants as $descendant)
        $descriptors[ (string) $descendant ] = array('tree_id'=>(string) $descendant['tree_id']);         

    $result['definition'] = (string) $definition[0];
    $result['term'] = (string) $term[0];
    $result['descriptors'] = $descriptors;

    return array('result'=>$result);

}

function get_descriptors_from_decs( $queryUrl ){
  
    // use the curl as default
    if ( function_exists('curl_version') ){

        $ch = curl_init();
        $timeout = 5; // set to zero for no timeout
        curl_setopt ( $ch, CURLOPT_URL, $queryUrl);
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
        $file_contents = curl_exec($ch);
        curl_close($ch);

    $xmlFile = new SimpleXMLElement($file_contents);
    
    // if dont have the curl use the simplexml_load_file to load the decs xml
    } elseif ( function_exists('simplexml_load_file') == "Enabled" ){

        $xmlFile = simplexml_load_file( $queryUrl );

    } else {
        Throw new Exception('This module need simplexml or curl to get the descriptors from bvs.salude.');
    }

    return $xmlFile;

}