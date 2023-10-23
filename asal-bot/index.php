<?php
include 'Telegram.php';
$telegram = new Telegram('6697864263:AAEvbrkiDZk9ObTG07juE1NHDYfbnom6O4M');

$chat_id = $telegram->ChatID(); 

$text = $telegram->Text(); 

  if($text=='/start'){

    $option = [[$telegram->buildKeyboardButton("😊 Batafsil malumot"),],
    [$telegram->buildKeyboardButton("😊 Buyurtma berish"),]];

        $keyb = $telegram->buildKeyBoard($option, $onetime = true, $resize = true); 

    $telegram->sendMessage(['chat_id' => $chat_id, 'text' => 'Assalomu aleykum botimizga xush kelibsiz']);

    $telegram->sendMessage(['chat_id' => $chat_id,'reply_markup' => $keyb, 'text' => 'Sizga qanaqa yordam bera olamiz']);
}
elseif($text=="😊 Batafsil malumot"){

    $telegram->sendMessage(['chat_id' => $chat_id, 'text' => "Biz haqimizda malumot. <a href='https://telegra.ph/
    
    Biz-haqimizda-04-25'>Havola</a>",'parse_mode'=>"html"]);
};
// Assalomu alaykum, asalni asalarichilardan oling! Marhamat qilib /start tugmasini boshing!