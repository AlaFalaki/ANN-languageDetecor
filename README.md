# languageDetecor
a PHP Artificial Neural Network (ANN) to detect if a string is Persian/English using FANN library.

# How To Use languageDetector?
1. Install FANN for PHP. (For guidance <a href="http://php.net/manual/en/fann.installation.php">click here</a>.)
2. Download all files, put them together in a folder.
3. Run "train_model.php". ( The script will create a file name "langDetector.net" )
4. Now you can run test_model.php and give any mixed string (Persian/English) to the ANN and see the output.

# Example:
I tested a string as follows:
<p dir="rtl">"شناسایی زبان نوشتاری با استفاده از Artificial Neural Network و کتابخانه FANN"</p>
The output was:
```
Array ( [0] => 0.96449780464172 [1] => -0.035985063761473 )
```
Where indice 0 represent chance for a string to be Persian, and 1 represent the chance for a string to be English. (The script's decision was very good.)

# About "parser.php" File:
You looked at the source code? yes, your right! I could have optimized it BIG TIME! But at the time i was writing this script i just wanted the result for a paper that i was writing. So i wasn't concern about any performance issue. (If you have time, be my guest, send a request pull, i really appreciate it.)

# a Word With Persian Speakers:
<p dir="rtl">
به زودی آموزش کامل از معرفی تا نحوه استفاده از شبکه‌های عصبی مصنوعی به همراه آموزش کامل اجرای کدهای این مخزن را بر روی وبلاگ منتشر خواهم کرد.
</p>

#### This Project Released Under MIT License.
