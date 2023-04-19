<?php
// specify the URL endpoint for the model
$url = 'https://teachablemachine.withgoogle.com/models/KJcbO4o7d/predict';
// create a new cURL resource
$ch = curl_init();

// set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

// specify the image file to send in the request
$image_path = '/Users/cutesytee/Desktop/hackathon/images/test.jpg';
$image_data = file_get_contents($image_path);
$post_data = array('image' => base64_encode($image_data));
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

// send the request and get the response
$response = curl_exec($ch);

// check for cURL errors
if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

// close the cURL resource
curl_close($ch);

// print the response from the model
echo $response;
