<?php
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $client_id = '78vdpvqcy7xcd4';
    $client_secret = 'WPL_AP0.brOoavWbXMiPmQ7J.MzQzNDE0OTk1Ng==';
    $redirect_uri = 'http://localhost/linkedin_callback.php';

    // Obtener el token de acceso
    $url = 'https://www.linkedin.com/oauth/v2/accessToken';

    $data = array(
        'grant_type' => 'authorization_code',
        'code' => $code,
        'redirect_uri' => $redirect_uri,
        'client_id' => $client_id,
        'client_secret' => $client_secret
    );

    $options = array(
        'http' => array(
            'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result, true);

    if (isset($response['access_token'])) {
        $access_token = $response['access_token'];

        // Obtener datos del perfil del usuario
        $profile_url = 'https://api.linkedin.com/v2/me';
        $email_url = 'https://api.linkedin.com/v2/emailAddress?q=members&projection=(elements*(handle~))';

        $headers = array(
            "Authorization: Bearer $access_token"
        );

        // Obtener nombre y apellido del perfil
        $profile_options = array(
            'http' => array(
                'header' => implode("\r\n", $headers),
                'method' => 'GET'
            )
        );

        $profile_context = stream_context_create($profile_options);
        $profile_result = file_get_contents($profile_url, false, $profile_context);
        $profile = json_decode($profile_result, true);

        // Obtener email del usuario
        $email_context = stream_context_create($profile_options);
        $email_result = file_get_contents($email_url, false, $email_context);
        $email_response = json_decode($email_result, true);
        $email = $email_response['elements'][0]['handle~']['emailAddress'];

        echo '<h2>Datos del perfil de LinkedIn</h2>';
        echo 'Nombre: ' . $profile['localizedFirstName'] . '<br>';
        echo 'Apellido: ' . $profile['localizedLastName'] . '<br>';
        echo 'Email: ' . $email . '<br>';

        // Aquí puedes guardar los datos del usuario en tu base de datos o usarlos según tus necesidades
    } else {
        echo "Error al obtener el token de acceso";
    }
} else {
    echo "No se recibió ningún código de autorización";
}
?>
