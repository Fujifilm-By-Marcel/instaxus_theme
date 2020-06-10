<?php

require_once('phpxmlrpc-4.4.1/lib/xmlrpc.inc');

function authenticate(){
	$account = 'fujifilm';
	$username = 'mmunevar';
	$password = 'Q08CJ4aFmf63';

	$xmlrpc = new xmlrpc_client("http://$account.$username:$password@app.adestra.com/api/xmlrpc");
	$xmlrpc->setDebug(0);
	$xmlrpc->request_charset_encoding="UTF-8";
	
	return $xmlrpc;

}

function createContact($xmlrpc, $firstname, $lastname, $email, $product_name, $insta, $twitter, $dob){

	// contact.create(table_id, contact_data, dedupe_field)
	$msg = new xmlrpcmsg(
	    "contact.create",
	    array(
	        // table_id
			new xmlrpcval(2, "int"),
			// contact_data
			new xmlrpcval(
				array(
					"first_name" => new xmlrpcval($firstname,"string"),
					"last_name" => new xmlrpcval($lastname,"string"),
					"email" => new xmlrpcval($email,"string"),
					"user_accepts_marketing_1" => new xmlrpcval("Yes","string"),
					"product_name" => new xmlrpcval($product_name,"string"),
					"country" => new xmlrpcval("United States","string"),
					"twitter_handle" => new xmlrpcval($twitter,"string"),
					"instagram_handle" => new xmlrpcval($insta,"string"),
					"date_of_birth" => new xmlrpcval($dob,"string"),
				),
				"struct"
			),
			// dedupe_field
			new xmlrpcval("email","string"),
	    )
	);

	$response = $xmlrpc->send($msg);

	/*
	echo "<pre>";
	print_r($response);
	echo "</pre>";	
	*/

	return $response->val->me['int'];

}

function addContactToList($xmlrpc, $contactID, $listID){
	// contact.addList(contact_id, list_id)
	$msg = new xmlrpcmsg(
	    "contact.addList",
	    array(
	        // contact_id
			new xmlrpcval( intval ( $contactID ),"int"),

			  // list id
			new xmlrpcval( $listID,"int"), 

	    )
	);

	$response = $xmlrpc->send($msg);

	/*
	echo "<pre>";
	print_r($response);
	echo "</pre>";
	*/
}


function subscribeContact($xmlrpc, $contactID, $listID){
	// contact.subscribe(contact_id, list_ids, unsub_list_ids)
	$msg = new xmlrpcmsg(
	    "contact.subscribe",
	    array(
	        // contact_id
			new xmlrpcval( intval ( $contactID ),"int"),

			new xmlrpcval(
				array(
					new xmlrpcval( $listID,"int"), 
				),
				"array"
			),
	    )
	);

	$response = $xmlrpc->send($msg);

	/*
	echo "<pre>";
	print_r($response);
	echo "</pre>";
	*/
}