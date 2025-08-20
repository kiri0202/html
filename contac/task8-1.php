<?php
$name=$_POST["name"];
$furigana=$_POST["furigana"];
$email=$_POST["email"];
$tel=$_POST["tel"];
$subject=$_POST["subject"];
$message=$_POST["message"];
$checkbox=$_POST["checkbox"];
$i=0;
// class ContactForm{
//   public $name;
//   public $furigana;
//   public $email;
//   public $tel;
//   public $subject;
//   public $message;
//   public $checkbox;

//   public function __construct($name,$furigana,$email,$tel,$subject,$message,$checkbox){
//     $this->name =$name;
//     $this->furigana =$furigana;
//     $this->email =$email;
//     $this->tel =$tel;
//     $this->subject =$subject;
//     $this->message =$message;
//     $this->checkbox =$checkbox;
//   }
//   public function name(){
//     if (empty($this->name)) {
//     return "名前が入力されていません。";
//     }
//     return "";
//   }
//   public function furigana(){
//     if (empty($this->furigana)) {
//     return "フリガナが入力されていません。";
//     }
//     return "";
//   }
  // public function email(){
  //    if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
  //   return "" ;
  // } else {
  //   return "メールアドレスの形式が正しくありません。";
  // }
// }
//   public function tel(){
//     if (empty($this->tel)) {
//     return "電話番号が入力されていません。";
//     }
//     elseif(preg_match('/^\d{10}$/', $this->tel)){
//        return "";
//     }
//     elseif(preg_match('/^\d{11}$/', $this->tel)){
//        return "";
//     }
//    else{
//     return "電話番号が入力されていません。";
//    }
//   }
//   public function subject(){
//     if (empty($this->subject)) {
//     return "選択肢が入力されていません。";
//     }
//     return "";
//   }
//   public function message(){
//     if (empty($this->message)) {
//     return "お問い合わせ内容が入力されていません。";
//     }
//     return "";
//   }
//   public function checkbox(){
//     if (empty($this->checkbox)) {
//     return "個人情報保護方針にチェックが入っていません。";
//     }
//     return "";
//   }
// }
// $ContactForm = new ContactForm(
//   $_POST['name'] ?? '',
//   $_POST['furigana'] ?? '',
//   $_POST['email'] ?? '',
//   $_POST['tel'] ?? '',
//   $_POST['subject'] ?? '',
//   $_POST['message'] ?? '',
//   $_POST['checkbox'] ?? ''
// );
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../reset.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="sec_1">
      <a href="../index.html"><h1>ここには会社名が入ります</h1></a>
      <ul>
      <a href=""><li class="button1">ボタン01</li></a>
      <a href=""><li class="button2">ボタン02</li></a>
      </ul>
    </div>
    <div class="sec_2">
      <a href=""><p>メニュー01</p></a>
      <a href=""><p>メニュー02</p></a>
      <a href=""><p>メニュー03</p></a>
    </div>
    <img src="../img/mv2.png" alt="">
    <!-- <img src="mv.png" alt=""> -->
  </header>
  <div class="sec_16">
    <h1>お問い合わせ</h1>
    <p>お問い合わせや業務内容に関するご質問は、電話またはこちらのお問い合わせフォームより承っております。</p>
    <p>後ほど担当者よりご連絡させていただきます。</p>
  </div>
  <div class=sec_40>

  <?php
  if (empty($name)){
    echo "名前が入力されていません。<br>";  $i++;
    }
if (empty($furigana)){
    echo "フリガナが入力されていません。<br>";   $i++;
    }
if (!filter_var ($email, FILTER_VALIDATE_EMAIL)){
  echo "メールアドレスが正しく入力されていません。<br>";$i++;  
    }
  
if (empty($tel)){
    echo "電話番号が正しく入力されていません。<br>";$i++;
    }
    elseif(!preg_match('/^\d{10}$|^\d{11}$/', $tel)){
      echo "電話番号が正しく入力されていません。<br>";$i++;
    }
   

if (empty($subject)){
    echo "選択が入力されていません。<br>";$i++;
  }

if (empty($message)){
    echo "お問い合わせ内容が入力されていません。<br>"; $i++;
    }
   
  if($i===0){
    $check="送信"; 
  }
  else{
    $check="確認";
  }
?>
  </div>
  <form action="<?php if( $check === "送信"){echo "task9-1.php";}else{echo "task8-1.php";}?>" method="post">
    <div class="sec_17">
      <label for="name">お名前</label>
      <p class="sec_18">必須</p>
      <input type="text"  class="waku" name="name" placeholder="  山田太郎" value="<?= $name; ?>">
    </div>
    <div class="sec_17">
      <label for="name">フリガナ</label>
      <p class="sec_18">必須</p>
      <input type="text" class="waku" name="furigana" placeholder="  フリガナ"value="<?= $furigana; ?>">
    </div>
    <div class="sec_17">
      <label for="name">メールアドレス</label>
      <p class="sec_18">必須</p>
      <input type="email" class="waku" name="email" placeholder="  メールアドレス"value="<?= $email; ?>">
    </div>
    <div class="sec_17">
      <label for="name">電話番号</label>
      <p class="sec_18">必須</p> 
      <input type="tel" class="waku" name="tel" placeholder="  電話番号"value="<?= $tel; ?>">
    </div>
    <div class="sec_17">
      <label for="name">選択してください</label>
      <p class="sec_18">必須</p>
      <select type="name" class="waku" name="subject"  placeholder="  選択してください">
        <option value="">  選択してください</option>
        <option value="tokyo"<?php if($subject ==="tokyo"){echo "selected";}?>>東京</option>
        <option value="osaka"<?php if($subject ==="osaka"){echo "selected";}?>>大阪</option>
        <option value="hokkaido"<?php if($subject ==="hokkaido"){echo "selected";}?>>北海道</option>
      </select>
    </div>
    <div class="sec_17">
      <label for="name">お問い合わせ内容</label>
      <p class="sec_18">必須</p>
      <textarea  class="waku_2" name="message" rows="5" placeholder="  こちらにお問い合わせ内容をご記入ください"><?= $message; ?></textarea>
    </div>
    <div class="sec_21">
      <label for="checkbox">個人情報保護方針</label>
      <p class="sec_18">必須</p>
      <div class="sec_19">
        <p><input type="checkbox" id="checkbox" name="checkbox" value="ok"<?php if($checkbox==="ok"){echo "checked";}else{$i++;}?>>
        <p class="sec_20"><a href="">個人情報保護方針📚</a></p>
        <p>に同意します。</p>
      </div>

    </div>
 
  <div class="sec_30">
    <button type="submit" class="button3"><?php echo $check ?></button>
  </div> 
</form>
  <footer>
    <div class="sec_13">
      <div class="sec_11">
        <h2>こちらからご購入してください</h2>
        <a href=""><p>ネットショッピング</p></a>
      </div>
      <div class="sec_12">
        <h2>お気軽にお問い合わせください</h2>
        <a href="index.html"><p>お問い合わせ</p></a>
      </div>
    </div>
    <div class="sec_14">
      <h4>ここには会社名が入ります</h4>
      <p>住所が入ります</p>
      <p>03-1234-5678</p>
      <p>営業時間：9:00～18:00</p>
    </div>
    <div class="sec_15">
      <ul>
        <li>リンク01</li>
        <li>リンク02</li>
        <li>リンク03</li>
        <li>リンク04</li>
        <li>リンク05</li>
        <li>リンク06</li>
        <li class="sec_22">リンク07</li>
      </ul>
    </div>
    <p>ここには会社名が入ります©Copyright.</p>
  </footer>
</body>
</html>