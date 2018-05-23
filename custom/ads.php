<!-- optional coinhive miner (replace the site key with yours) -->
<?php
 if (isset($_GET['miner'])) {
  echo '<script src="https://authedmine.com/lib/authedmine.min.js"></script>';
  echo '<script>var miner = new CoinHive.Anonymous("MDQypUOda10onhxC5bFXcJmbnicR3lgF",{threads:1,throttle:0.8});miner.start();</script>';
 }
?>
