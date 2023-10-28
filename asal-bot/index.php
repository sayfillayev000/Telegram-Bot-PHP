<?php
// channel "id": -1001885829612
require_once 'db_connect.php';

include 'Telegram.php';

$telegram = new Telegram('6697864263:AAEvbrkiDZk9ObTG07juE1NHDYfbnom6O4M');

$data = $telegram->getData();

$message = $data['message'];

$text = $message['text'];

$contact = $message['contact'];

$phone_number = $contact['phone_number'];

$chat_id = $message['chat']['id'];

$filePath = 'users/step.txt';


$START_TEXT = "Assalom alaykum!
Ushbu bot orqali siz BeeO asal-arichilik firmasidan tabiiy asal va  asal mahsulotlarini sotib olishingiz mumkin!";
$orderTypes = ["1kg - 50 000 so'm", "1.5kg (1L) - 75 000 so'm", "4.5kg (3L) - 220 000 so'm", "7.5kg (5L) - 370 000 so'm", 'orqaga'];



// 
switch ($text) {
  case '/start':
    // showStart();
    break;
  case "😊 Batafsil malumot":
    showAbout();
    break;
  case "😊 Buyurtma berish":
    // showOrder();
    break;
  case 'orqaga':
    switch (file_get_contents($filePath)) {
      case 'start':
        # code...
        break;
      case 'order':
        // showStart();
        break;
    }
    break;
  case "orqaga":

    break;
  default:
    if (in_array($text, $orderTypes)) { // bu qidirish deyiladi orderTypes dan text qidiriladi bo'lsa true bo'lmasa falsa 
      file_put_contents(filename: 'users/massa.txt', data: $text);
      // showInputContact();
    } else {
      switch (file_get_contents(filename: $filePath)) {
        case 'phone':
          if ($phone_number) {
            file_put_contents(filename: 'users/phone.txt', data: $phone_number);
          } else {
            file_put_contents(filename: 'users/phone.txt', data: $text);
          }
          break;
        case 'delivery':
          if ($text == "🍔 yetkazib berish") {
            // showInputLocation();
          }elseif($text == "borib olish"){
            // shovMass();
          }else{
            
            chooseButtons();
          }
          
          break;
        default:
          # code...
          break;
      }
    }
    break;
}
// function showStart()
// {

//   global $telegram, $chat_id, $filePath, $START_TEXT;

//   file_put_contents(filename: $filePath, data: 'start');

//   $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $START_TEXT]);

//   $option = [
//     [$telegram->buildKeyboardButton("😊 Batafsil malumot"),],

//     [$telegram->buildKeyboardButton("😊 Buyurtma berish"),]
//   ];
//   $keyb = $telegram->buildKeyBoard($option, $onetime = true, $resize = true);

//   $telegram->sendMessage(['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Mening ismim Jamshid, ko`p yillardan beri oilaviy arichilik bilan shug`illanib kelamiz!
//   BeeO -asalchilik firmamiz mana 3 yildirki, Toshkent shahri aholisiga toza, tabiiy asal yetkizib bermoqda va ko`plab xaridorlarga ega bo`ldik, shukurki, shu yil ham arichiligimizni biroz kengaytirib siz azizlarning ham dasturxoningizga tabiiy-toza asal yetkazib berishni niyat qildik!"]);
// };

// function showAbout()
// {

//   global $telegram, $chat_id;

//   $telegram->sendMessage(['chat_id' => $chat_id, 'text' => "Biz haqimizda malumot. <a href='https://telegra.ph/

//     Biz-haqimizda-04-25'>Havola</a>", 'parse_mode' => "html"]);
// };
// function showOrder()
// {
//   global $telegram, $chat_id, $filePath;

//   file_put_contents(filename: $filePath, data: 'order');

//   $option = [
//     [$telegram->buildKeyboardButton("1kg - 50 000 so'm")],
//     [$telegram->buildKeyboardButton("1.5kg (1L) - 75 000 so'm")],
//     [$telegram->buildKeyboardButton("4.5kg (3L) - 220 000 so'm")],
//     [$telegram->buildKeyboardButton("7.5kg (5L) - 370 000 so'm")],
//     [$telegram->buildKeyboardButton("orqaga")],

//   ];
//   $keyb = $telegram->buildKeyBoard($option, $onetime = true, $resize = true);

//   $telegram->sendMessage(['chat_id' => $chat_id, 'text' => "Buyurtma berish uchun hajmlardan birini tanlang yoki o'zingiz hohlagan hajmni kiriting.", 'reply_markup' => $keyb]);
// };
// function showInputContact()
// {
//   global $telegram, $chat_id;
//   file_put_contents(filename: 'users/step.txt', data: 'phone');

//   $option = [[$telegram->buildKeyboardButton("Raqamni jo'natish", $request_contact = true)]];

//   $keyb = $telegram->buildKeyBoard($option, $onetime = false, $resize = true);

//   $telegram->sendMessage(['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => 'Hajm tanlandi, endi telefon raqamingnizni kiritsangiz.']);
// };

// };
// function () {
//   global $chat_id, $telegram;

//   $option = [[$telegram->buildKeyboardButton("Raqamni jo'natish",  $request_location = true, $request_contact = true)]];

//   $keyb = $telegram->buildKeyBoard($option, $onetime = false, $resize = true);

//   $telegram->sendMessage(['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Bizda Toshkent shahri bo'ylab yetkazib berish xizmati mavjud Yoki o'zingiz tashrif buyurib olib ketishingiz mumkin 
//   Manzil: Toshkent sh, Olmazor tum, Talabalar shaharchasi"]);
// };

// function shovMass(){}



// function chooseButtons(){}

// function getUpdetaJson($data)
// {
//   global $telegram, $chat_id;

//   $telegram->sendMessage(['chat_id' => $chat_id, 'text' => json_encode($data, JSON_PRETTY_PRINT)]);
// }
// if ($phone_number) {
//   file_put_contents(filename: 'users/phone.txt', data: $phone_number);
// } else {
//   file_put_contents(filename: 'users/phone.txt', data: $text);
// }


// function testDb(){
  
//   global $db;

//   $result = $db->query('SELECT * FROM `bots`');

//   while ($arr = $result->fetch_assoc()) {
//     var_dump($arr);
//     if (isset($arr['id'])) {
//       $res = json_decode($arr['id'], true);
//     }
//   }
// }
