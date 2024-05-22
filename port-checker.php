<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Checker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <header class="mb-5">
            <h1 class="text-center" >Portcheckers.com</h1>
            <p  class="text-center">Free online Port Checker tool that can verify whether the ports of any internet-connected device are open or closed.</h2>
        </header>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Port Checker</h5>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $ip = $_POST['ip-address'];
                            $port = $_POST['port-number'];

                            // Perform the port check (example using fsockopen)
                            $socket = @fsockopen($ip, $port, $errno, $errstr, 1);

                            if ($socket) {
                                echo '<div class="alert alert-success" role="alert">Port ' . $port . ' is open on ' . $ip . '</div>';
                                fclose($socket);
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Port ' . $port . ' is closed or unavailable on ' . $ip . '</div>';
                                echo $errstr;
                            }
                        }
                        ?>
                        <form id="port-checker-form" method="POST">
                            <div class="form-group">
                                <label for="ip-address">Your IP:</label>
                                <input  type="text" class="form-control" id="ip-address" name="ip-address" placeholder="Enter your IP address" value="<?php echo isset($_POST['ip-address']) ? $_POST['ip-address'] : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="port-number">Port to Check:</label>
                                <input  type="number" class="form-control" id="port-number" name="port-number" placeholder="Enter port number" value="<?php echo isset($_POST['port-number']) ? $_POST['port-number'] : ''; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Check Port</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
             <div class="col">
           <h2>  What Is a Port Checker and How Does It Work? </h2>
            
            <a href="https://wwww.portcheckers.com"> Port Checker</a> is a free online tool that checks a remote computer or device's Internet connectivity. It can be used to check for open ports or to Ping a remote server. This tool is also useful for testing Port Forwarding settings.
            The TCP Port Checker attempts to connect to the server and displays a success message on the screen if the connection is successful or if it receives a port open signal. You can't use this tools to check local ports in your computer.. To run this test, your computer or network device must be directly connected to the internet, or a port must be forwarded to the system if connected via a router.
             </div>       
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>