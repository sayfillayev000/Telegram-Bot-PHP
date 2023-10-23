<?
header('Content-Type: text/html; charset=utf-8');
// header('Content-Type: application/json; charset=utf-8');
date_default_timezone_set('Asia/Tashkent');
$admin = 736482067;
const API_KEY = '5712315040:AAE7GZxVHfMd1ez6uCrqKYiUs1VGos7w3Y4';

function dump($what){
    echo '<pre>'; 
        print_r($what); 
    echo '</pre>';
};

function bot($method, $params = []){
    $url = "https://api.telegram.org/bot".API_KEY."/" . $method;
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $params,
        CURLOPT_HTTPHEADER => ['Content-Type:multipart/form-data'],
    ]);
    $res = curl_exec($curl);
    // dump(curl_getinfo($curl));
    curl_close($curl);
    if (!curl_error($curl)) return json_encode(json_decode($res, true), JSON_PRETTY_PRINT);
};

$update = json_decode(file_get_contents('php://input'));
$my_group = "-1001813690347";
$message = $update->message;
$chat_id = $message->chat->id;
echo $new_members = $message->new_chat_members[0]->id; 
// echo $new_members[0]->id;

// file_put_contents("log.json",json_encode(json_decode(file_get_contents('php://input'), true), JSON_PRETTY_PRINT));

echo bot('sendMessage', [
    'chat_id' => $my_group,
    'text' => 'salommmmmm'
]);

echo bot('getChatAdministrators', [
    'chat_id' => $my_group
]);
// sendMessage
// markdown mode
// $mess_text = "
// *To'yintirilgan matn bold*\n
// _Yotiq yozuv italic_\n
// __Ostki chiziqli matn  underline__\n
// ~Inkor qilingan matn strikethrough~\n
// ||Yashirin matn spoiler||\n
// `Ko'chirib olish mumkin bo'lgan matn code`\n
// [Biriktirilgan havola inline link](http://www.example.com)\n
// [Tgram foydalanuchisiga havola user link](tg://user?id=679143250)\n
// ```
// Ko'rsatmalar yoki codelar uchun maxsus formatlash turidagi matn... Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s pre
// ```
// ";
// echo bot('sendMessage', [
//     'chat_id' => $admin,
//     'text' => $mess_text,
//     'parse_mode' => "MarkdownV2"
// ]);


// HTML mode
// $mess_text = "
// <b>To'yintirilgan matn bold</b>\n
// <i>Yotiq yozuv italic</i>\n
// <u>Ostki chiziqli matn underline</u>\n
// <s>Inkor qilingan matn strikethrough</s>\n
// <tg-spoiler>Yashirin matn spoiler</tg-spoiler>\n
// <code>Ko'chirib olish mumkin bo'lgan matn code</code>\n
// <a href='http://www.example.com'>Biriktirilgan havola inline link</a>\n
// <a href='tg://user?id=5366289252'>Tgram foydalanuchisiga havola user link</a>\n
// <pre>
// Ko'rsatmalar yoki codelar uchun maxsus formatlash turidagi matn... Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s pre
// </pre>";
// echo bot('sendMessage', [
//     'chat_id' => $admin,
//     'text' => $mess_text,
//     'parse_mode' => "HTML"
// ]);


// disable_web_page_preview
// disable_notification
// protect_content
// reply_to_message_id
// allow_sending_without_reply

// echo bot('sendMessage', [
//     'chat_id' => $admin,
//     'text' => "https://www.youtube.com/watch?v=uaEAn5AB2Jw",
//     // 'disable_web_page_preview' => true, //  bunda vedio yuborsak tg o'zida vedioni ochiq holatda ko'rish imkonini beradi 
//     // 'disable_notification' => true, // bu bildirish nomalarsiz yuboradi bezzuk keladi 
//     'protect_content' => true, // bu eng kerakli content hisoblanadi bu xabarni shaer qilishni taqiqlaydi qarqatishga ruxsat bermaydi himoyalaydi
//     // 'reply_to_message_id' => 900, // bu siz yozgan so'zga javob tariqasida yoziladi va user yozgan text ni id si berilishi kerak 
//     // 'allow_sending_without_reply' => true // bu hali mavjud bo'lmagan xabarga jabob ber deb belgilasak xatobermaydi 
// ]);

// markups
// inline btns

// echo bot('sendMessage', [
//     'chat_id' => $admin,
//     'text' => "Bu inline reply markup",
//     'disable_web_page_preview' => true,
//     'reply_markup' => json_encode([
//         'inline_keyboard' => [ // inline_keyboard bo'lsa bu matnga qo'shilib keladi 
//             [['text' => "textbtn1", 'callback_data' => 'btn1'],['text' => "textbtn2", 'callback_data' => 'btn2'],['text' => "textbtn3", 'callback_data' => 'btn3']],
//             [['text' => "Saytga havola", 'url' => 'httpp://youtube.com'],],
//             [['text' => "kanalga havola 👣", 'url' => 'https://t.me/Infomiruz']],
//             [['text' => "👉 videoni korish 👈", 'url' => 'https://www.youtube.com/watch?v=uaEAn5AB2Jw']],
//             [['text' => "Share tugmasi", 'url' => 'https://t.me/share/url?url=https://www.youtube.com/watch?v=uaEAn5AB2Jw&text=Mashu+videoni+ko\'rda']],
//             [['text' => "Muhammad 😎😎", 'url' => 'tg://user?id=736482067']],
//         ]
//     ])
// ]);

// callback_data nimga tenglangan bo'lsa beckend ga shu so'rov boradi 
// url orqali url ni berishimiz kerak 
// https://t.me/share/url?url=https://www.youtube.com/watch?v=uaEAn5AB2Jw&text=Mashu+videoni+ko\'rda'  / bunda shu havolani share qilish  

// menu markup
// echo bot('sendMessage', [
//     'chat_id' => $admin,
//     'text' => "Bu menu markup",
//     'disable_web_page_preview' => true,
//     'reply_markup' => json_encode([
//         'resize_keyboard'=> true,
//         'one_time_keyboard'=> true, // bu birmartalik button bisoblanadi buni true qilib qo'ysak button berkilib qoladi 
//         'input_field_placeholder'=> "Telefon raqam kiriting...", // bu inputni placeholder ni bildiradi 
//         'keyboard' => [
//             [['text' => "textbtn1 ✌️"],['text' => "textbtn2 🤟"],['text' => "textbtn3 🤘"]],
//             [['text' => "Raqamni yuborish ☎️", 'request_contact' => true]], // request_contact bu method userni tel raqamini yuboradi 
//             [['text' => "Manzilni yuborish 🎯", 'request_location' => true]],
//             [
//                 ['text' => "Quiz", 'request_poll' => ['type' => 'quiz']], // quiz so'rovnomalar yaratish 
//                 ['text' => "Regular", 'request_poll' => ['type' => 'regular']],
//                 ['text' => "Quiz + Regular", 'request_poll' => ['type' => 'regular, quiz']],
//             ],
//         ]
//     ])
// ]);

// remove + force_reply

// echo bot('sendMessage', [
//     'chat_id' => $admin,
//     'text' => "Karta raqamingizni kiriting",
//     'disable_web_page_preview' => true,
//     'reply_markup' => json_encode([
//         // 'remove_keyboard' => true, // remove_keyboard bu button larni o'chirish uchun ishlatiladi 
//         'force_reply' => true, // bu xuddi atvedit xabar qilib yuborganday bo'lib turadi o'zi 
//         'input_field_placeholder' => "8600 **** **** ****"
//     ])
// ]);


// // forwardMessage

// echo bot('forwardMessage', [
//     'chat_id' => $admin, // bu qaysi xabar ni peresat qilib qaysidir userga  yuborish uchun ishlatiladi yani man yozganimni boshqa birovga yuborish uchun 
//     'from_chat_id' => $admin,
//     'message_id' => 25515 // id
// ]);

// // copyMessage
// echo bot('copyMessage', [ // bu ham tepadagi bilan bir xil faqat bu egasini ko'rsatmasdan yuboradi 
//     'chat_id' => $admin,
//     'from_chat_id' => $admin,
//     'message_id' => 731
// ]);


// sendPhoto
// echo bot('sendPhoto', [
//     'chat_id' => $admin,
//     'photo' => "https://mproweb.uz/YTless/tgramApi/rasm.jpg",
//     'caption' => "Bu internetdan url bn yuborilgan rasm" // bu rasm haqida malumot beriladi
// ]);
// echo bot('sendPhoto', [
//     'chat_id' => $admin,
    // 'photo' => new CURLFile("rasm.jpg"), // bu hostingdagi rasmi o'zini yuborish 
//     'caption' => "local yuborilgan rasm"
// ]);
// echo bot('sendPhoto', [
//     'chat_id' => $admin,
//     'photo' => "AgACAgQAAxkDAAIC4mJefuPfkRpMxMTaxNq6Dod7GWHnAAKgtjEbUi7wUpE5XnfCPhYTAQADAgADeAADJAQ", // bunaqa qilib yuborsakham bo'ladi buni foydalanuvchiga biror rasm yuborsak tg server bizga shunaqa kod beradi va biz bu rasm ni qaytib ishlatishimiz mumkin  
//     'caption' => "telegram serveridan file id bn yuborilgan rasm"
// ]);



// sendAudio
// echo bot('sendAudio', [
//     'chat_id' => $admin,
//     'audio' => "https://mproweb.uz/YTless/tgramApi/audio.mp3", // link bilan yuborish 
//     'caption' => "Bu internetdan url bn yuborilgan audio file" // link bilan yuborilganda pasda ishlatilgan method lar ishlamaydi 
// ]);
// echo bot('sendAudio', [
//     'chat_id' => $admin,
//     'audio' => new CURLFile("audio.mp3"),
//     'caption' => "local yuborilgan audio file",
//     'performer' => "Notanish Amerikos",
//     'title' => "Mening Amerikam :)",
//     'thumb' => new CURLFile("audio_player.jpg"),
// ]);
// echo bot('sendAudio', [
//     'chat_id' => $admin,
//     'audio' => "CQACAgQAAxkDAAIBymJdq4kDCvRIiANcVyky0O22wUdjAAJRCwACUi7wUn2yRw34Y2CnJAQ", // bunaqa file_id bilan yuborish eng qulay usul hisobnadi chunki buni tg serveridan olamiz va bizni serverda joy olmaydi
//     'caption' => "telegram serveridan file id bn yuborilgan audio file",
//     'performer' => "Notanish Amerikos",
//     'title' => "Mening Amerikam :)",
//     'thumb' => "AAMCBAADGQMAAgLoYl6BDtmxnIt0VTJfqd-xtMx8T6QAAnALAAJSLvhSH6xprIRjZZIBAAdtAAMkBA",
// ]);


// sendVideo
// echo bot('sendVideo', [
//     'chat_id' => $admin,
//     'video' => "https://mproweb.uz/YTless/tgramApi/myvideo.mp4",
//     'caption' => "Bu internetdan url bn yuborilgan video file",
//     'supports_streaming'=> true // bu vedioni to'liq ochmasdanham ko'rish uchun true qilib qo'yishimiz kerak 
// ]);
// echo bot('sendVideo', [
//     'chat_id' => $admin,
//     'video' => new CURLFile("myvideo.mp4"),
//     'caption' => "local yuborilgan video file",
//     'thumb' => new CURLFile("audio_player.jpg"), // bu vedio oldidagi rasm ni bildiradi 
//     'supports_streaming'=> true
// ]);
// echo bot('sendVideo', [
//     'chat_id' => $admin,
//     'video' => "BAACAgQAAxkDAAIBz2JdrK3ou-nQ6WWqi5Qdcva86bVfAAJTCwACUi7wUok9Mm_o3v0YJAQ",
//     'caption' => "telegram serveridan file id bn yuborilgan video file",
//     'thumb' => "AAMCBAADGQMAAgHPYl2srei76dDpZaqLlB1y9rzptV8AAlMLAAJSLvBSiT0yb-je_RgBAAdtAAMkBA",
//      'supports_streaming'=> true
// ]);

// // sendAnimation
// echo bot('sendAnimation', [
//     'chat_id' => $admin,
//     'animation' => "https://mproweb.uz/YTless/tgramApi/animation.mp4",
//     'caption' => "Bu internetdan url bn yuborilgan animation file",
//     'duration'=> 10
// ]);
// echo bot('sendAnimation', [
//     'chat_id' => $admin,
//     'animation' => new CURLFile("animation.mp4"),
//     'caption' => "local yuborilgan animation file",
//     'thumb' => new CURLFile("audio_player.jpg"),
//     'duration'=> 10
// ]);
// echo bot('sendAnimation', [
//     'chat_id' => $admin,
//     'animation' => "CgACAgQAAxkBAAIC-WJehm8SVqV6De9cxUq5N6kBAf50AAI8AgACuEKVUuYAASofde-oeyQE",
//     'caption' => "telegram serveridan file id bn yuborilgan animation file"
// ]);


// sendVoice
// echo bot('sendVoice', [
//     'chat_id' => $admin,
//     'voice' => "https://mproweb.uz/YTless/tgramApi/voice.ogg",
//     'caption' => "Bu internetdan url bn yuborilgan voice file"
// ]);
// echo bot('sendVoice', [
//     'chat_id' => $admin,
//     'voice' => new CURLFile("voice.ogg"),
//     'caption' => "local yuborilgan voice file"
// ]);
// echo bot('sendVoice', [
//     'chat_id' => $admin,
//     'voice' => "AwACAgQAAxkDAAIB0mJdrhDGHY14qxs8Dixi801Wae1XAAJLAwACQHztUqexwAYzhiUIJAQ",
//     'caption' => "telegram serveridan file id bn yuborilgan voice file",
// ]);

// sendVideoNote
// echo bot('sendVideoNote', [ // bu dumaloq vedio yuborish uchun ishlatiladi buni url bilan yuborib bo'lmaydi 
//     'chat_id' => $admin,
//     'video_note' => new CURLFile("videoNote.mp4"),
//     'caption' => "local yuborilgan video_note file",
//     'thumb' => new CURLFile("face.jpg")
// ]);
// echo bot('sendVideoNote', [
//     'chat_id' => $admin,
//     'video_note' => "DQACAgQAAxkDAAIB1GJdrs4WOzCAsL7cS4Apu2IUKS9-AAJWCwACUi7wUj3aFyG-jmcMJAQ",
//     'caption' => "telegram serveridan file id bn yuborilgan video_note file",
//     'thumb' => "AAMCBAADGQMAAgHUYl2uzhY7MICwvtxLgCm7YhQpL34AAlYLAAJSLvBSPdoXIb6OZwwBAAdtAAMkBA"
// ]);


// sendDocument
// echo bot('sendDocument', [
//     'chat_id' => $admin,
//     'document' => "https://mproweb.uz/YTless/tgramApi/test file.pdf",
//     'caption' => "Bu internetdan url bn yuborilgan document file"
// ]);
// echo bot('sendDocument', [
//     'chat_id' => $admin,
//     'document' => "https://mproweb.uz/YTless/tgramApi/test file.pdf",
//     'caption' => "Bu internetdan url bn yuborilgan document file unknown format",
//     'disable_content_type_detection' => true
// ]);
// echo bot('sendDocument', [
//     'chat_id' => $admin,
//     'document' => new CURLFile("test arxiv.rar"),
//     'caption' => "local yuborilgan document file",
//     'thumb' => new CURLFile("file.jpg"),
// ]);
// echo bot('sendDocument', [
//     'chat_id' => $admin,
//     'document' => "BQACAgQAAxkDAAIB12JdsBasedZyRPutkU0KRhNsNwMsAAJXCwACUi7wUjgYWm_yyRf7JAQ",
//     'caption' => "telegram serveridan file id bn yuborilgan document file",
//     'thumb' => "AAMCBAADGQMAAgHXYl2wFqx51nJE-62RTQpGE2w3AywAAlcLAAJSLvBSOBhab_LJF_sBAAdtAAMkBA"
// ]);

// sendMediaGroup
// audio
// echo bot('sendMediaGroup', [  // bu birnech file larni bitta qilib yuborish uchun 
//     'chat_id' => $admin,
//     'media' => json_encode(
//         [
//             [
//                 'type' => 'audio',
//                 'caption' => 'Bu internetdan url bn yuborilgan audio file',
//                 'media' => "https://mproweb.uz/YTless/tgramApi/audio.mp3",
//                 'thumb' => "AAMCBAADGQMAAgHKYl2riQMK9EiIA1xXKTLQ7bbBR2MAAlELAAJSLvBSfbJHDfhjYKcBAAdtAAMkBA"
//             ],
//             [
//                 'type' => 'audio',
//                 'caption' => 'telegram serveridan file id bn yuborilgan audio file',
//                 'media' => "CQACAgQAAxkDAAIB4WJdsd6OgKv0nqy7DiP82mZT94TgAAKLAwACj1zsUqvnaNy05FsbJAQ"
//             ]
//         ]
//     )
// ]);

// video + photo
// echo bot('sendMediaGroup', [
//     'chat_id' => $admin,
//     'media' => json_encode(
//         [
//             [
//                 'type' => 'photo',
//                 'caption' => 'Bu internetdan url bn yuborilgan rasm',
//                 'media' => "https://mproweb.uz/YTless/tgramApi/rasm.jpg"
//             ],
//             [
//                 'type' => 'photo',
//                 'caption' => 'telegram serveridan file id bn yuborilgan rasm',
//                 'media' => "AgACAgQAAxkDAAIByGJdqFVM8bHhh73o7hizKyUAAcVbcwACoLYxG1Iu8FKROV53wj4WEwEAAwIAA3gAAyQE"
//             ],
//             [
//                 'type' => 'photo',
//                 'caption' => 'Bu internetdan url bn yuborilgan rasm fly.jpg',
//                 'media' => "https://mproweb.uz/YTless/tgramApi/fly.jpg"
//             ],
//             [
//                 'type' => 'photo',
//                 'caption' => 'telegram serveridan file id bn yuborilgan rasm fly.jpg',
//                 'media' => "AgACAgQAAxkBAAIB9WJdtDDRqbk_l4UmfBTFwp8yGDfJAAIttzEbUi7wUkHppz8z1ushAQADAgADeQADJAQ"
//             ],
//             [
//                 'type' => 'video',
//                 'caption' => 'Bu internetdan url bn yuborilgan video',
//                 'media' => "https://mproweb.uz/YTless/tgramApi/myvideo.mp4",
//                 'supports_streaming' => true
//             ],
//             [
//                 'type' => 'video',
//                 'caption' => 'telegram serveridan file id bn yuborilgan video',
//                 'media' => "BAACAgQAAxkDAAIBz2JdrK3ou-nQ6WWqi5Qdcva86bVfAAJTCwACUi7wUok9Mm_o3v0YJAQ",
//                 'supports_streaming' => true
//             ]
//         ]
//     )
// ]);


// echo bot('sendMediaGroup', [
//     'chat_id' => $admin,
//     'media' => json_encode(
//         [
//             [
//                 'type' => 'document',
//                 'caption' => 'Bu internetdan url bn yuborilgan document',
//                 'media' => "https://mproweb.uz/YTless/tgramApi/test file.pdf",
//                 'thumb' => "AAMCBAADGQMAAgHKYl2riQMK9EiIA1xXKTLQ7bbBR2MAAlELAAJSLvBSfbJHDfhjYKcBAAdtAAMkBA"
//             ],
//             [
//                 'type' => 'document',
//                 'caption' => 'telegram serveridan file id bn yuborilgan document',
//                 'media' => "BQACAgQAAxkDAAIB12JdsBasedZyRPutkU0KRhNsNwMsAAJXCwACUi7wUjgYWm_yyRf7JAQ"
//             ]
//         ]
//     )
// ]);

// sendSticker
// echo bot('sendSticker', [ // bu bilan Sticker yuborishimiz mumkin asosan bu id bilan yuboriladi 
//     'chat_id' => $admin,
//     'sticker' => "CAACAgIAAxkBAAICAAFiXbbphC-tJ6Ee6zEZeJXvboBCNgACBgADwDZPE8fKovSybnB2JAQ"
// ]);
// echo bot('sendSticker', [
//     'chat_id' => $admin,
//     'sticker' => "CAACAgIAAxkBAAIDIGJejur14WI1_uF0ZBntZSIigtlGAAIaAAPANk8TgtuwtTwGQVckBA"
// ]);


// sendlocation
// echo bot('sendLocation', [
//     'chat_id'=> $admin,
//     'latitude' => 41.311514,
//     'longitude' => 69.2400093,
//     'horizontal_accuracy' => 50 // bu 50 qanchalik aniqlikda yuborish 
// ]);

// sendVenue
// echo bot('sendVenue', [
//     'chat_id'=> $admin,
//     'latitude' => 41.311514,
//     'longitude' => 69.2400093,
//     'title' => "Xalqlar do'stligi sanat saroyi",
//     'address' => "Islom Karimov st. 00 a uy"
// ]);


// // sendContact
// echo bot('sendContact', [
//     'chat_id'=> $admin,
//     "phone_number" => "+998994460450",
//     "first_name" => "SaidAbbos",
//     "last_name" => "Khudoykulov",
//     "vcard" => "BEGIN:VCARD\nVERSION:3.0\nFN:SaidAbbos Khudoykulov\nTEL;MOBILE:+998994460450\nEND:VCARD" // bu vcard ni saxranit qilish uchun
// ]);

// sendPoll
// echo bot('sendPoll', [ // test tuzish 
//     'chat_id'=> $admin,
//     "question" => "Savol regular",
//     "options" => json_encode([
//         "javob0",
//         "javob1+",
//         "javob2",
//         "javob3",
//     ])
// ]);
// echo bot('sendPoll', [
//     'chat_id'=> $admin,
//     "question" => "Savol regular multiply",
//     "options" => json_encode([
//         "javob0",
//         "javob1+",
//         "javob2",
//         "javob3",
//     ]),
//     'allows_multiple_answers' => true,
//     'is_anonymous' => false,
// ]);
// echo bot('sendPoll', [
//     'chat_id'=> $admin,
//     "question" => "Savol regular",
//     "options" => json_encode([
//         "javob0",
//         "javob1+",
//         "javob2",
//         "javob3",
//     ]),
//     'is_anonymous' => false,
//     'open_period' => 300,
//     'correct_option_id' => 1,
// ]);

// echo bot('sendPoll', [
//     'chat_id'=> $admin,
//     "question" => "Savol quiz",
//     "options" => json_encode([
//         "javob0",
//         "javob1+",
//         "javob2",
//         "javob3",
//     ]),
//     'is_anonymous' => true,
//     'type' => "quiz",
//     'explanation' => "O'ylab kor, osonku",
//     'correct_option_id' => 1,
//     'close_date' => time() + 550
// ]);
// echo bot('sendPoll', [
//     'chat_id'=> $admin,
//     "question" => "Savol quiz",
//     "options" => json_encode([
//         "javob0",
//         "javob1+",
//         "javob2",
//         "javob3",
//     ]),
//     'is_anonymous' => true,
//     'type' => "quiz",
//     'explanation' => "O'ylab kor, osonku",
//     'correct_option_id' => 1,
//     'close_date' => time() + 10
// ]);


// sendDice
// // score 1-6
// echo bot('sendDice', [ // bu o'yin tuzish uchun ishlatoladi agar emoji ni ko'rsatmasak bu aftomatik toshni tashlaydi  
//     'chat_id' => $admin,
//     'emoji' => '🎲'
// ]);
// echo bot('sendDice', [
//     'chat_id' => $admin,
//     'emoji' => '🎯'
// ]);
// echo bot('sendDice', [
//     'chat_id' => $admin,
//     'emoji' => '🎳'
// ]);
// score 1-5
// echo bot('sendDice', [
//     'chat_id' => $admin,
//     'emoji' => '🏀'
// ]);
// echo bot('sendDice', [
//     'chat_id' => $admin,
//     'emoji' => '⚽'
// ]);
// score 1- 64
// echo bot('sendDice', [
//     'chat_id' => $admin,
//     'emoji' => '🎰'
// ]);

// sendChatAction bu bot nima ish qilayotgani to'g'risida axborot beradi 
// echo bot('sendChatAction', [
//     'chat_id' => $admin,
//     'action' => 'typing'
// ]);
// echo bot('sendChatAction', [
//     'chat_id' => $admin,
//     'action' => 'record_video'
// ]);
// echo bot('sendChatAction', [
//     'chat_id' => $admin,
//     'action' => 'upload_video'
// ]);
// echo bot('sendChatAction', [
//     'chat_id' => $admin,
//     'action' => 'record_voice'
// ]);
// echo bot('sendChatAction', [
//     'chat_id' => $admin,
//     'action' => 'upload_voice'
// ]);
// echo bot('sendChatAction', [
//     'chat_id' => $admin,
//     'action' => 'upload_document'
// ]);
// echo bot('sendChatAction', [
//     'chat_id' => $admin,
//     'action' => 'choose_sticker'
// ]);
// echo bot('sendChatAction', [
//     'chat_id' => $admin,
//     'action' => 'find_location'
// ]);
// echo bot('sendChatAction', [
//     'chat_id' => $admin,
//     'action' => 'record_video_note'
// ]);
// echo bot('sendChatAction', [
//     'chat_id' => $admin,
//     'action' => 'upload_video_note'
// ]);





// echo bot('sendMessage', [
//     'chat_id' => $admin,
//     'text' => "Bot ishlayapti (test) !!!"
// ]);

// setMyCommands
// echo bot('setMyCommands', [
//     'commands' => json_encode([
//         ["command" => "/start", "description" => "Start bot"], // BU camanda haqida malumot 
//         ["command" => "/info", "description" => "Bot haqida"],
//         ["command" => "/buy", "description" => "Buyurtma berish"]
//     ])
// ]);

// echo bot('setMyCommands', [
//     'commands' => json_encode([
//         ["command" => "/start", "description" => "Старт бота"],
//         ["command" => "/info", "description" => "Информация о системе"],
//         ["command" => "/buy", "description" => "Заказать новый товар"]
//     ]),
//     'language_code' => "ru" // bu tilni tanlash uchun qo'yigan qaysi tilni qo'ysak shu tilda boradi
// ]);

// echo bot('setMyCommands', [
//     'commands' => json_encode([ // bu bilan kamanda qo'shamiz 
//         ["command" => "/start", "description" => "Start bot"],
//         ["command" => "/info", "description" => "About us"],
//         ["command" => "/buy", "description" => "Buy new pruduct"]
//     ]),
//     // 'language_code' => "en",
//     // 'scope' => json_encode([
//     //     'type' => "all_private_chats"
//     // ])
// ]);
// echo bot('getMyCommands');
// echo bot('getMyCommands', [
//     // 'scope' => json_encode([
//     //     'type' => "all_private_chats"
//     // ]),
//     // 'language_code' => 'ru',
//     // 'language_code' => 'en',
// ]);
// echo bot('deleteMyCommands', [ // bu bilan camandalarni o'chirishimiz mumkin qaysi tilni yoqsak shu tildagi kamandalar o'chib ketadi agar unga hech narsa bermasak default camandalarham o'chib ketadi 
//     // 'scope' => json_encode([
//     //     'type' => "all_private_chats"
//     // ]),
//     // 'language_code' => 'ru',
//     // 'language_code' => 'en',
// ]);

// setChatMenuButton
// echo bot('setChatMenuButton', [
//     'chat_id' =>  $admin,
//     'menu_button' => json_encode([
//         // 'type' => "defult",
//         'type' => "commands",
//     ])
// ]);
// echo bot('getChatMenuButton', [
//     'chat_id' =>  $admin
// ]);


// // freind user
// echo bot('getChat', [
//     'chat_id' =>  $admin
// ]);
// // aliense user
// echo bot('getChat', [
//     'chat_id' =>  $admin
// ]);
// // bot 
// echo bot('getChat', [
//     'chat_id' => 5366289252
// ]);
// // joined channel
// echo bot('getChat', [
//     'chat_id' => "-1001624814365"
// ]);
// // joined group
// echo bot('getChat', [
//     'chat_id' => "-1001552299980"
// ]);
// // joined supergroup
// echo bot('getChat', [
//     'chat_id' => "-1001797419694"
// ]);
// // aliense channel
// echo bot('getChat', [
//     'chat_id' => "-1001090616869"
// ]);


// aliense user
// echo bot('getUserProfilePhotos', [
//     'user_id' => $admin,
//     // 'offset' => 1,
//     // 'limit' => 1,
// ]);
// bot 
// echo bot('getUserProfilePhotos', [
//     'user_id' => 5366289252
// ]);

// echo bot('sendPhoto', [
//     'chat_id' => $admin,
//     'photo' => "AgACAgIAAxUAAWUyzTjJgwZPEug-0H3fZigEsBDFAAIVqDEbE9PlK0Nghri4wZoNAQADAgADYwADMAQ", // BU bilan glavnimdagi rasmlarni ko'rib yuborish imkoniga egaman 
// ]);

// // adminlikdagi kanal
// echo bot('getChatAdministrators', [ // bu method bilan biza guruh yoki kanallardagi adminlar ro'yxati va ulan nimalar qila olishi haqida malumot olishimiz mumkin 
//     'chat_id' => -1001624814365
// ]);
// // adminlikdagi guruh
// echo bot('getChatAdministrators', [
//     'chat_id' => -1001797419694
// ]);
// // begona kanal
// echo bot('getChatAdministrators', [
//     'chat_id' => "-1001090616869"
// ]);
// // begona huruh
// echo bot('getChatAdministrators', [
//     'chat_id' => "-1001266628952"
// ]);


// // adminlikdagi kanal
// echo bot('getChatMember', [ // bu method bilan biz faqat admin bo'lmagan kanal va yopiq guruhlardan malumot ololmaymiz 
//     'chat_id' => -1001624814365,
//      'user_id' => 713516566,
// ]);
// // adminlikdagi guruh
// echo bot('getChatMember', [
//     'chat_id' => -1001797419694,
//      'user_id' => 713516566,
// ]);
// // adminlikdagi guruh oddiy user
// echo bot('getChatMember', [
//     'chat_id' => -1001797419694,
//      'user_id' => 679143250,
// ]);
// // begona kanal
// echo bot('getChatMember', [ // begona kanaldan malumot ololmaymiz 
//     'chat_id' => "-1001090616869",
//      'user_id' => 679143250,
// ]);
// // begona huruh
// echo bot('getChatMember', [ 
//     'chat_id' => "-1001797419694",
//      'user_id' => 679143250,
// ]);

// // adminlikdagi kanal
// echo bot('getChatMemberCount', [
//     'chat_id' => -1001624814365
// ]);
// // adminlikdagi guruh
// echo bot('getChatMemberCount', [
//     'chat_id' => -1001797419694
// ]);
// // adminlikdagi guruh oddiy user
// echo bot('getChatMemberCount', [
//     'chat_id' => -1001797419694
// ]);
// // begona kanal
// echo bot('getChatMemberCount', [
//     'chat_id' => "-1001090616869"
// ]);
// // begona huruh // bunda faqat yopiq guruhni malumotlarini ololmaymiz admin bo'lmasak 
// echo bot('getChatMemberCount', [
//     'chat_id' => "-1001266628952"
// ]);

// setChatPhoto
// adminlikdagi kanal
// echo bot('setChatPhoto', [ // bilan kanal va gruhlarga foto qo'yishimiz mumkin 
//     'chat_id' => -1001624814365,
//     'photo' => new CURLFile("chat.png")
// ]);
// // adminlikdagi guruh
// echo bot('setChatPhoto', [
//     'chat_id' => -1001797419694,
//     'photo' => new CURLFile("chat.png")
// ]);

// deleteChatPhoto
// // adminlikdagi kanal
// echo bot('deleteChatPhoto', [
//     'chat_id' => -1001624814365
// ]);
// // adminlikdagi guruh
// echo bot('deleteChatPhoto', [
//     'chat_id' => -1001797419694
// ]);

// setChatTitle
// adminlikdagi kanal
// echo bot('setChatTitle', [
//     'chat_id' => -1001624814365,
//     'title' => "Bu kanal title"
// ]);
// // // adminlikdagi guruh
// echo bot('setChatTitle', [
//     'chat_id' => -1001797419694,
//     'title' => "Bu guruh title"
// ]);

// setChatDescription
// adminlikdagi kanal
// echo bot('setChatDescription', [
//     'chat_id' => -1001624814365,
//     'description' => "Bu kanal deskription",
// ]);
// // adminlikdagi guruh
// echo bot('setChatDescription', [
//     'chat_id' => -1001797419694,
//     'description' => "Bu guruh deskription",
// ]);

// pinChatMessage
// adminlikdagi kanal
// echo bot('pinChatMessage', [ // bu chatni pin qilib qo'yish uchun ishlatiladi
//     'chat_id' => -1001624814365,
//     'message_id' => 28,
// ]);
// // adminlikdagi guruh
// echo bot('pinChatMessage', [
//     'chat_id' => -1001797419694,
//     'message_id' => 31,
// ]);

// unpinAllChatMessages
// adminlikdagi kanal
// echo bot('unpinAllChatMessages', [ // bu pin xabarni olib tashash 
//     'chat_id' => -1001624814365
// ]);
// // adminlikdagi guruh
// echo bot('unpinAllChatMessages', [
//     'chat_id' => -1001797419694
// ]);

// leaveChat
// adminlikdagi kanal
// echo bot('leaveChat', [ // bu bot shu kanaldan chiqib ketishi mumkin
//     'chat_id' => -1001624814365
// ]);
// // adminlikdagi guruh
// echo bot('leaveChat', [
//     'chat_id' => -1001797419694
// ]);


// banChatMember... //
echo bot('banChatMember',[ // bu method bilan biror userni chorniga tiqishimiz mumkin 
 'chat_id'=> $admin, // group supergroup kanal id si beriladi
 'user_id'=> $admin, // o'chirib tashlamoqchi bo'lgan user id si beriladi 
 'until_date' => 25453515, // bunga sekund da ko'rsatiladi qancha vaqtga chorni qilganimiz 366 days or less than 30 seconds
 'revoke_messages' => true, // agar bunga true qo'ysak foydananuvchi bilan birga uning yozgan xabarlariham o'chib ketadi 

]);

echo bot('unbanChatMember',[ // bu method bilan biror chorniga tiqqan userni chiqarishimiz  mumkin 
 'chat_id'=> $admin, // group supergroup kanal id si beriladi
 'user_id'=> $admin, // o'chirib tashlamoqchi bo'lgan user id si beriladi 
 'only_if_banned' => true, // bunga true qo'yadigan bo'lsak agar oddiy  userni chornidan chiqaradigaan bo'lsak xato bermasligi uchun ishlatiladi 
 

]);