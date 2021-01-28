<?php	
	$app->add('session', function() use($app) {
        $app->is('GET', function() use($app) {
            if( isset($_GET['url']) ) {
                $session = $app->db->getRow("SELECT * from `session` WHERE closed=0 AND url=?s", $_GET['url']);
                if( !empty($session) AND $session !== NULL ) {
    
                    $asks = $app->db->getAll("SELECT * from `asks` WHERE `session_id`=?i", $session['id']);
                    if( !empty($asks) AND $asks !== NULL ) {

                        App::render('session', [
                            'session' => $session,
                            'asks' => $asks
                        ]);

                        die();
                    }
                }
            }

            echo "Сессия не найдена!";
        });

        $app->is('POST', function() use($app) {
            foreach($_POST as $key => $value) {
                if( strpos($key, '_answer') !== false ) {
                    $id = intval( str_replace('_answer', '', $key) );

                    $app->db->query('UPDATE asks SET anwser=?s WHERE id=?i', $value,  $id);
                }
            }

            $app->db->query('UPDATE `session` SET closed=1 WHERE id=?i', $_POST['session_id']);

            echo "Сессия с вопросами закрыта! Спасибо";
        });
	});
?>