<?php
/**
 * Created by PhpStorm.
 * User: zhao
 * Date: 2018/4/27
 * Time: 14:06
 */

return [
    //网关
    'gatewayUrl'=> "https://openapi.alipay.com/gateway.do",

    'appId'=> 2017050307090610,

    //商户私钥
    'rsaPrivateKey'=> '11MIIEwAIBADANBgkqhkiG9w0BAQEFAASCBKowggSmAgEAAoIBAQDekW4snkahDwdI3cd1U6mTAJKhO2YXAPJsqEyU0Jebo/g0feX+ta1u/luOOTBitynnniH38h/2+iz3RzfBF1UcL+UNdwP+UACYVs0gcE7YUXWVDVeuOQKCBNVoa6Rh5+gpZVXHsAfV8wm2R+pia0PJZGFMdY2JLEDND7Z62P+Q88GfI6gEIW8Uew8xFlF3j6S4lZFpqdyZiEB3q8eY+O6FXJPHamidSd7eR/0vq4IXiUmM1fKgchCry/kpnzwtSPcaJezXcbi1MtsAfdN2BF4u5WU8lfCYdEvpWtcmAgZpP/iuziD+8le35v0Q5d4Mgp+K6+Dsf+Zxo7lnJpcoKJ6JAgMBAAECggEBAJ6ZiaYX34Kzv+An0hOEW6laViK4viYUUawmPfQptG9/Z8aYFIXuFrmqXbm6fQVLOnxHjjMugaKwYcyQHmXlZ4vfgVyX++uEPPhRmnjMLxMs8RoW2O1YyLW4Fg8D7a6q4CBnirnycZL/TmNrWdVqVHK1qjQe7I3cUA0QbluaOHukM0yTLyeIImgXNqiDfmbT97NMQQvdSCj1d2rX24z/xKuWNbhrBFMutoUr4KUABgv+PkitGzMYEszU0+tOQaE+99H43iwbgtrQDC4flx8kaorBBjPigUnJ4rKGkHJBA2WOFAwZpuK21BLMecrdaI0v91X8vynFaswgz6dgt711EYECgYEA+QN306VVloDuWwJzWE+9uFZ96AERQVu3DwbeMlUnrYqIIB6lQI6GAhsCtnNT57ww/cEXzghtVcbk7Cfi61ZoM4doi5x1NpZK87McWmFLGq4Tft15r+LE6Vf6fdR0MBDezJj2kS+Uy6uu7HBodSbKHtjJBabBEOL0qok/AON96xECgYEA5NAExA7xavPU+y6yMkR1s8AetZUurDu93NcUKbyuZcr26ddDADc5pLUuNd0f3W46SxbUJEC7b2EIIlXUQS+4x7vvsgObTqxiFEuDRCVUih4GpRXPmJLvjnDlXhawce8lJ8wz6WaOpzNWuIMzPYXkgbzUmWbXNUftrTANE1fBS/kCgYEA+FVbFPkXp+agzqZc/b9YhxPKsKsP2Exs/VFuGmgOD+XN56poRz9bqZHiXK4bCUoG2anN4a1JzHd0KYeFqAkeFfV+b2zzACNWUD9ZkVDiI5Ni4exhxOS0V7ljmEVeMelBKG2LyDLZg1yOMEHSCrNKcwTjRP2OIRcVxVTmPi6hjuECgYEA3MaGQrJ0aJEayL42vF/n/ed6+hQWs6L1QFfaoabn01oyQlEs2dFvcihLjTduHpbT8k31pYE8GWzTj2WnZrpoHXiOAAKQ4SldfV2bK66lUptEKBfSddIZCSSPe+iCmXx5KlxTHnqRXG0h2OjnEQ7W/AO6UsWzEzry7u91PlunK+kCgYEA1+02bNeUiO8m8pNHu+KXLqyXvp24C7RxdsBSlTrTSyGlQFzkmjSNBdbPAJwhX8VZni7LCt+mFa2WKTOp1L1caiDIPEdh4EU9sjs/Lank5EvaK6ErdiZRkSC8FVVBQfukeOyKMvkByn7JxbJidbsA27tB90T+NlMjQGVapflckhk=>',//应用私钥

    //支付宝公约
    'alipayrsaPublicKey'=> 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAg3oEKihunhZZQFrvy8BqVX5aWA7MtVYm7ETjTLdS7T3Uzd7oLIo3Glhgucm/i/s/GL75tSaHv16y060uVUy0TIEDXaLx3PCVMnTujAP+kQj7QuuFaBe4P4ebl/PZyZjmpBU9qOl1deTV97j6clH2+EWjwx5zUuReuNjLKE9fd4pzuGsy+/RQXquSGIbkNQYNgKq+JbIlmXA4f9781EP2UNtBHbwxd0mGf9sdWlalO7sxw0CyAuElOuWYeAwp4XePTultPgpHPR2yxgNCdBVycbghf1x2hwBep2lnMdWqlt6nOhWbEHpSRnWDk2lRZRprN4hwSGFyxhS5m9SdP0jv2QIDAQAB',//支付宝公钥

    'apiVersion'=> '1.0',

    //签名类型
    'signType'=> 'RSA2',

    'postCharset'=> 'utf-8',

    'format'=> 'json',

    'callbackUrl'=>'http://'.$_SERVER['SERVER_NAME'].'/auth-callback',
];