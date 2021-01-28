<?php
    // Редактировать вопрос
    $app->add('admin/questionnaire/edit', function() use($app) {
    	if(App::isAdmin()) {
	        $app->is('GET', function() use($app) {
	             if(isset($_GET['id'])) {
	                $id = intval($_GET['id']);
	                
	                $result = $app->db->getRow('SELECT * FROM asks WHERE id=?i', $id);

	                if(!empty($result)) {
	                    App::render('admin/questionnaire/edit', [
	                        'data' => $result
	                    ]);                    
	                }              
	            }           
	        });

	        $app->is('POST', function() use($app) {
	        	$payload = $_POST['payload'];
				$id = intval($_POST['id']);

				$app->db->query('UPDATE asks SET payload=?s WHERE id=?i', $payload,  $id);
	
				if(isset($_POST['type']) AND (isset($_POST['type']) !== '[]')) {
					$app->db->query('UPDATE asks SET type=?s WHERE id=?i', $_POST['type'],  $id);
				}
	            $app->redirect('admin/questionnaire/index&session_id='.$_POST['session_id'].'');            
	        });  
        }      
    });
?>