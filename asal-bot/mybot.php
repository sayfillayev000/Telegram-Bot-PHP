<?php
require_once 'Telegram.php';
require_once 'user.php';

$telegram = new Telegram('6697864263:AAEvbrkiDZk9ObTG07juE1NHDYfbnom6O4M');

$data = $telegram->getData();

$message = $data['message'];

$text = $message['text'];

$contact = $message['contact'];

$location = $message['location'];

$latitude = $location['latitude'];

$longitude = $location['longitude'];

$phone_number = $contact['phone_number'];

$chat_id = $message['chat']['id'];

$admin = 736482067;

$orderTypes = ["1kg - 50 000 so'm", "1.5kg (1L) - 75 000 so'm", "4.5kg (3L) - 220 000 so'm", "7.5kg (5L) - 370 000 so'm", 'orqaga'];

if ($text == '/start') {
    showMain();
} else {
    switch (getPage($chat_id)) {
        case 'main':
            switch ($text) {
                case "🍯 Batafsil ma'lumot":
                    showAbout();
                    break;
                case "🍯 Buyurtma berish":
                    showMassa();
                    break;
                default:
                    chooseButtons();
            }
            break;
        case 'massa':
            if (in_array($text, $orderTypes)) {
                setMassa($chat_id, $text);
                showPhone();
            } elseif ($text == "🔙 Orqaga") {
                showMain();
            } else {
                setMassa($chat_id, $text);
                showPhone();
            }
            break;
        case 'phone':
            if ($phone_number) {
                setPhone($chat_id, $phone_number);
                showDeliveryType();
            } elseif ($text == "🔙 Orqaga") {
                showMassa();
            } else {
                setPhone($chat_id, $text);
                showDeliveryType();
            }
            break;
        case 'delivery':
            switch ($text) {
                case "✈️ Yetkazib berish ✈":
                    showInputLocation();
                    break;
                case "🍯 Borib olish 🍯":
                    showReady();
                    break;
                case "🔙 Orqaga":
                    showPhone();
                    break;
                default:
                    chooseButtons();
            }
            break;
        case 'location':
            if ($latitude) {
                setLatitude($chat_id, $latitude);
                setLongitude($chat_id, $longitude);
                showReady();
            } elseif ($text == "Lakatsiya jo'nata olmayman") {
                showReady();
            } elseif ($text == "🔙 Orqaga") {
                showDeliveryType();
            } else {
                chooseButtons();
            }
            break;
        case 'ready':
            switch ($text) {
                case "Boshqa buyurtma berish":
                    showMain();
                    break;
                default:
                    chooseButtons();
            }
            break;
        default:
            chooseButtons();
    }
}



function showMain()
{
    global $telegram, $chat_id;

    setPage($chat_id, 'main');

    $telegram->sendMessage(['chat_id' => $chat_id, 'text' => "Assalom alaykum!
    Ushbu bot orqali siz BeeO asal-arichilik firmasidan tabiiy asal va  asal mahsulotlarini sotib olishingiz mumkin!"]);

    $option = [
        [$telegram->buildKeyboardButton("🍯 Batafsil ma'lumot"),],

        [$telegram->buildKeyboardButton("🍯 Buyurtma berish"),]
    ];
    $keyb = $telegram->buildKeyBoard($option, $onetime = true, $resize = true);

    $telegram->sendMessage(['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Mening ismim Jamshid, ko`p yillardan beri oilaviy arichilik bilan shug`illanib kelamiz!
  BeeO -asalchilik firmamiz mana 3 yildirki, Toshkent shahri aholisiga toza, tabiiy asal yetkizib bermoqda va ko`plab xaridorlarga ega bo`ldik, shukurki, shu yil ham arichiligimizni biroz kengaytirib siz azizlarning ham dasturxoningizga tabiiy-toza asal yetkazib berishni niyat qildik!"]);
}

function chooseButtons()
{
    global $telegram, $chat_id;

    $telegram->sendMessage(['chat_id' => $chat_id, 'text' => 'iltimos quyidagi tugmalardan birini tanlang 👇']);
}

function showAbout()
{

    global $telegram, $chat_id;

    $telegram->sendMessage(['chat_id' => $chat_id, 'text' => "Biz haqimizda malumot. <a href='https://telegra.ph/

    Biz-haqimizda-04-25'>Havola</a>", 'parse_mode' => "html"]);
};

function showMassa()
{
    global $telegram, $chat_id;

    setPage($chat_id, 'massa');

    $option = [
        [$telegram->buildKeyboardButton("1kg - 50 000 so'm")],
        [$telegram->buildKeyboardButton("1.5kg (1L) - 75 000 so'm")],
        [$telegram->buildKeyboardButton("4.5kg (3L) - 220 000 so'm")],
        [$telegram->buildKeyboardButton("7.5kg (5L) - 370 000 so'm")],
        [$telegram->buildKeyboardButton("🔙 Orqaga")],

    ];
    $keyb = $telegram->buildKeyBoard($option, $onetime = true, $resize = true);

    $telegram->sendMessage(['chat_id' => $chat_id, 'text' => "Buyurtma berish uchun hajmlardan birini tanlang yoki o'zingiz hohlagan hajmni kiriting.", 'reply_markup' => $keyb]);
};

function showPhone()
{
    global $telegram, $chat_id;

    setPage($chat_id, 'phone');

    $option = [
        [$telegram->buildKeyboardButton("Raqamni jo'natish", $request_contact = true)],
        [$telegram->buildKeyboardButton("🔙 Orqaga")]
    ];

    $keyb = $telegram->buildKeyBoard($option, $onetime = false, $resize = true);

    $telegram->sendMessage(['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => 'Hajm tanlandi, endi telefon raqamingnizni kiritsangiz.']);
};

function showDeliveryType()
{
    global $telegram, $chat_id;

    setPage($chat_id, 'delivery');

    $option = [
        [$telegram->buildKeyboardButton("✈️ Yetkazib berish ✈")],
        [$telegram->buildKeyboardButton("🍯 Borib olish 🍯")],
        [$telegram->buildKeyboardButton("🔙 Orqaga")]
    ];

    $keyb = $telegram->buildKeyBoard($option, $onetime = false, $resize = true);

    $telegram->sendMessage(['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Bizda Toshkent shahri bo'ylab yetkazib berish xizmati mavjud Yoki o'zingiz tashrif buyurib olib ketishingiz mumkin 
  Manzil: Toshkent sh, Olmazor tum, Talabalar shaharchasi"]);
}

function showInputLocation()
{

    global $telegram, $chat_id;

    setPage($chat_id, 'location');

    $option = [
        [$telegram->buildKeyboardButton("Lakatsiya jo'natish", false, true)],
        [$telegram->buildKeyboardButton("Lakatsiya jo'nata olmayman")],
        [$telegram->buildKeyboardButton("🔙 Orqaga")]
    ];

    $keyb = $telegram->buildKeyBoard($option, $onetime = false, $resize = true);

    $telegram->sendMessage(['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Yaxshi endi lokatsiyani jo'nating"]);
}

function showReady()
{
    global $telegram, $chat_id, $admin;

    setPage($chat_id, 'ready');

    $option = [
        [$telegram->buildKeyboardButton("Boshqa buyurtma berish")]
    ];

    $keyb = $telegram->buildKeyBoard($option, $onetime = false, $resize = true);

    $telegram->sendMessage(['chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "Sizning buyurtmangiz qabul qilindi. Tez orada siz bilan bog'lanamiz. Murojaatingiz uchun rahmat! 😊"]);

    $text = "Yangi buyurtma keldi!\n";
    $text .= "Hajm:" . getMassa($chat_id) . "\n";
    $text .= "Telefon raqam:" . file_get_contents(filename: 'users/' . $chat_id . 'phone.txt') . "\n";

    $telegram->sendMessage(['chat_id' => $admin, 'text' => $text]);

    if (getLatitude($chat_id)) {

        $telegram->sendLocation(['chat_id' => $admin, 'latitude' => getLatitude($chat_id), 'longitude' => getLongitude($chat_id)]);
    }
}
