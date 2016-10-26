DZ-sign
=======

PHP模拟DZ论坛签到任务签到

论坛是标准的DZ论坛，签到页面也是常见类型的。因为只用了DZ自带的防远程POST的检查程序，所以事实上只验证了formhash和Referer。其中Referer直接改就行，formhash也是能获取到的。

理论上对使用相同签到机制的DZ论坛也适用，可能得自己稍稍改改。
