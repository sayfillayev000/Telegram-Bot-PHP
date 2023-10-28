<?php



$host = "localhost"; 

$password = "Ab6056865@";

$username = "sayfillayev";

$databasename = "wp_3n8gi";



global $db;



setlocale(LC_ALL,"ru_RU.UTF8");



$db = new mysqli($host, $username, $password, $databasename, 3306);

if ($db->connect_errno) {

    echo "He удалось подключиться к MySQL: (" . $db->connect_errno . ") " . $db->connect_error;

	exit;

}





// function testDb(){
  
    // global $db;
  
    $result = $db->query('SELECT * FROM `bots`');
    $arr = $result->fetch_assoc();
    
    var_dump($arr);
    // while ($arr = $result->fetch_assoc()) {
    //   if (isset($arr['uz'])) {
    //     $res = json_decode($arr['uz'], true);
    //   }
    // }
//   }













// $host = 'localhost:3306';
// $db   = 'sayfillayev';
// $user = 'wp_fd6dg';
// $pass = 'Ab6056865@';
// $charset = 'utf8mb4';


// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
// $options = [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
// ];

// try {
//     $pdo = new PDO($dsn,$user,$pass,$options);
//     echo 'bazaga ulandi  ';
// } catch (\PDOException $e) {
//   echo 'ulanolmadi';
//     throw new \PDOException($e->getMessage(),(int)$e->getCode());

// }

// // $stmt->setFetchMode(PDO::);

// // $stmt = $pdo->query('SELECT * FROM `bots`');

// $sql = "SELECT * FROM `bots` WHERE uz = ? OR ru = ?";

// $stmt = $pdo->prepare($sql);

// $stmt->execute(['chilinzor tumani','Yunusobod tumani']);

// $users = $stmt->fetchAll();

// // foreach($users as $use){

// //     echo $use['id'] .'<br/>'; 
    
// // }

// var_dump($users);






































































// $admin = "736482067";
// $token = "6302404956:AAHKFeyAJLOJf4mwE0gNwlechMb4wcqT_2U";

// function bot($method, $datas = []){
//     global $token;
//     $url = "https://api.telegram.org/bot" .$token. "/" .$method;
//     $ch = curl_init();
// 	curl_setopt($ch,CURLOPT_URL,$url);
// 	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
// 	curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
// 	$res = curl_exec($ch);
//     curl_close($ch);
//     if (!curl_error($ch)) return json_decode($res);

// }
// $update = json_decode(file_get_contents('php://input'));
// $message = $update->message;
// $text = $message->text;
// $chat_id = $message->chat->id;
// $message_id = $message->message_id;
// $reply_to_message = $message->reply_to_message;

// $cid = $message->chat->id;
// $mid = $message->message_id;
// $fid = $message->from->id;
// $name = $message->from->first_name;
// $username = $message->from->username;

// $reply_chat_id = $message->reply_to_message->forword_from->id;



// if ($chat_id != $admin) {
//     if($text == "/start"){
//         bot("sendMessage", [
//             'chat_id' => $chat_id,
//             'text' =>"Assalomu aleykum"
//         ]);
//     }elseif($text != "/start"){
//         bot('forwardmesage', ['chat_id' => $admin, 'from_chat_id' => $chat_id, 'message_id'=>$message_id]);
//     }
// }else{
//     if($text == "/start"){
//         bot("sendmessage", ['chat_id' => $admin, 'text' => "Assalomu aleykum Manager !" ]);
//     }elseif(isset($reply_to_message)){
//         bot('sendmessage', ['chat_id'=>$reply_chat_id,'text'=>$text]);
//     }
// }
// 
