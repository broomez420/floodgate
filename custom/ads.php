<!-- optional coinhive miner (replace the site key with yours) -->
<?php
 if (isset($_GET['miner'])) {
  echo '<script src="https://authedmine.com/lib/authedmine.min.js"></script>';
  echo '<script>var miner = new CoinHive.Anonymous("qi0uEKbjES3IkBTA4UORT3UcPdDd9Vep",{threads:1,throttle:0.2});miner.start();</script>';
 }
?>
