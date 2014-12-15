<?php include 'header.php';?>
<div id="content">

<div id="content-top">
<div class="ctop-c">
<h1>Politweets</h1>
</div>
</div>

<div id="content-content">

<?php

                require_once('src/Basho/Riak/Riak.php');
                require_once('src/Basho/Riak/Bucket.php');
                require_once('src/Basho/Riak/Exception.php');
                require_once('src/Basho/Riak/Link.php');
                require_once('src/Basho/Riak/MapReduce.php');
                require_once('src/Basho/Riak/Object.php');
                require_once('src/Basho/Riak/StringIO.php');
                require_once('src/Basho/Riak/Utils.php');
                require_once('src/Basho/Riak/Link/Phase.php');
                require_once('src/Basho/Riak/MapReduce/Phase.php');
				
				$client = new Basho\Riak\Riak('172.31.32.109',10018);
				$myBucket = $client->bucket('world');
				$keys = $myBucket->getKeys();         
		
		for($x=0; $x<=sizeof($keys); $x++) {
		$fetched = $myBucket->get($keys[$x]);
		$data = $fetched->getData();

echo '<div class="ctweet">';

	echo '<div class="ctheader"><div class="ct"><a class="ttitel" href="';
	echo '">';
	echo $data['name'];
	echo '</a></div>';
	
	echo '<div class="datum">';
	echo $data['created_at'];
	echo '</div></div>';
	
	
	echo '<div class="tcontent"><p>';
	echo $data['text'];
	echo '</p></div>';

echo '</div>'

?>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lobortis, quam non efficitur porttitor, tortor augue dictum est, vitae commodo est lectus hendrerit ligula. Suspendisse fringilla auctor odio at finibus. Quisque accumsan non sapien vel scelerisque. Nullam facilisis ultricies turpis, eu venenatis mi gravida a. In gravida sem massa, a tincidunt turpis aliquam non. Sed a mauris volutpat, lacinia metus eget, aliquet mi. Donec eget lectus leo. Vestibulum ultrices ipsum odio, id ornare nulla porta vel. Sed sit amet rutrum ipsum. Vivamus tellus odio, varius vel tincidunt eu, aliquet sed ex. Morbi at pretium eros, et tincidunt lectus.</p>
<p>Sed et ornare nisi. Donec volutpat odio vitae arcu iaculis sagittis. Quisque ornare tellus nisi, id rutrum orci fringilla quis. Ut ex nibh, eleifend vestibulum rhoncus quis, luctus at risus. Donec est arcu, sollicitudin non nulla eu, feugiat vehicula nibh. Nullam vel eros ut nisi molestie interdum ac condimentum ligula. Nullam ultrices erat ut nulla egestas elementum. Integer congue sodales mi, quis placerat risus mollis non. Pellentesque a lacinia justo, ut aliquam ex.</p>
</div>

</div>

<?php include 'footer.php'; ?>