<?php
header('Content-Type: application/json');
    require_once '../vendor/autoload.php';
    
    use Milo\Github;
    $api = new Github\Api;
    $githubData = [
        'commit' => [],
        'user' => [],
        'date' => []
    ];
	
	

	$response_prog = $api->get('/repos/:owner/:repo/commits', ['owner' => $_GET['owner'], 'repo' => $_GET['repo']]);
	
    $fullRepoData = $api->decode($response_prog);
 
	$user=$fullRepoData[0]->author->login;
	$commit = $fullRepoData[0]->commit->message;
	$date = $fullRepoData[0]->commit->author->date;
	$githubData['commit']=$commit;
	$githubData['user']=$user;
	$githubData['date']	=$date;

    echo json_encode($githubData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);


?>