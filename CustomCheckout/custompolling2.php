<?php

?>
<!DOCTYPE html>
<html>

<head>
    <title>Custom Polling Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <fieldset>
        <legend>Request:</legend>
        <!-- Display Request Data Here -->
        <pre id="request-data"></pre>
    </fieldset>
    <fieldset>
        <legend>Response:</legend>
        <!-- Display Response Data Here -->
        <pre id="response-data"></pre>
    </fieldset>

    <script>
        // Function to make the API call and poll every 15 seconds
        function pollAPI() {
            // Your API endpoint URL
            const apiUrl = <?php ENV ?> '/theia/v1/transactionStatus';

            // Make an HTTP request to your API
            fetch(apiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        // <?php
                            // $TOKEN = $_POST["TOKEN"];
                            // $orderId = $_POST["orderId"];

                            // $paytmParams['body'] = array(
                            //     "orderId"           => $orderId,
                            //     "mid"   => MID
                            // );
                            // $paytmParams['head'] = array(
                            //     "tokenType"   => "TXN_TOKEN",
                            //     "version"   => "v2",
                            //     "token"   => $TOKEN,
                            // );
                            // 
                            ?>
                    }),
                })
                .then((response) => response.json())
                .then((data) => {
                    // Display the request data
                    document.getElementById('request-data').textContent = JSON.stringify(data, null, 2);

                    // Display the response data
                    document.getElementById('response-data').textContent = JSON.stringify(data, null, 2);

                    // Check if polling is required
                    if (data.body.isPollingRequired) {
                        // Continue polling every 15 seconds
                        setTimeout(pollAPI, 15000);
                    } else {
                        // Stop polling
                        console.log('Polling is no longer required.');
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }

        // Start polling when the page loads
        pollAPI();
    </script>
</body>

</html>