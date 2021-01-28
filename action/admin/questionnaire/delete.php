<?php
    $app->add('admin/questionnaire/delete', function() use($app) {
    	if(App::isAdmin()) {
	        $app->is('GET', function() use($app) {
	            if(isset($_GET['id'])) {
	                $id = intval($_GET['id']);     
					$app->db->query('DELETE FROM asks WHERE id=?i', $id);
					if(isset($_GET['session_id'])){
						if(intval($_GET['session_id']) !== 0) {
							$app->redirect('admin/questionnaire/index&session_id=' . intval($_GET['session_id']));
						}else {
							$app->redirect('admin/questionnaire/index');
						}
					} else {
						$app->redirect('admin/questionnaire/index');
					}
	            }
	        });
    	}
    });
?>