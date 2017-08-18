/*//Если нажата кнопка на регистрацию, поля не пустые, начинаем проверку
        if(isset($_POST['submit']))
            {
    //Проверяем наличие данных
        if(empty($_POST['name']))
        {
            $error[] = 'Поле Имя не может быть пустым!';
        }
        if(empty($_POST['email']))
        {
            $error[] = 'Поле Email не может быть пустым!';
        }
        else
        {
        if(!preg_match("/^[a-z0-9_.-]+@([a-z0-9]+\.)+[a-z]{2,6}$/i", $_POST['email']))
        {
           $error[] = 'Не правильно введен E-mail'."\n";
        }
        }

        if(empty($_POST['phone']))
        {
            $error[] = 'Поле Телефон не может быть пустым!';
        }
        else
        {
        if(!preg_match("/^\+380\d{3}\d{2}\d{2}\d{2}$/", $_POST['phone']))
        {
           $error[] = 'Не правильно введен Телефон'."\n";
        }
        }
    
    
        if(empty($_POST['password']))
        {
            $error[] = 'Поле Пароль не может быть пустым';
        }
        
    //Проверяем наличие ошибок и выводим пользователю
         if(count($error) > 0)
            {
             echo showErrorMessage($error);
            }
        }
            
        else
        { 
             $this->model->addUser($user);
             echo "<b>Вы успешно зарегистрированы!</b>";
        }
        }

        //$data['user'] = $newuser;
        print_r($user);
        

        $this->view->generate('register_view.php', 'template_view.php', $user, 'user');
    }
*/

