<?php

return [
    'alipay' => [
        'app_id'         => '2015121100960603',
        //'ali_public_key' => 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkrIvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsraprwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUrCmZYI/FCEa3/cNMW0QIDAQAB',
        'private_key'    => 'MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCxUc+KVFYS31tX6qr5VHcg2Db5fSUsATgfhaXlQYYREwMPf/XLsN5vW/EbcqBnM5Bd549diUO36QpBxLN2CTGJj621YeKwFWI4aFmjxDjz2KaGZeb3hiQo499x2iyS3sFZ1R9a0C0HiX+epnGNm5wJ+g6XxfO5PCIM3opXzhUgVDI7ga1uit9rZubFaX//8w39QGmcjl5x26GEZN/1WbXHjPdxUaGmAUSqPFqWyecN78YA0QIdQ6Kczdwisde4CCql7EGOQsoGKymMVTA2BqEbn/Eq/5zp7tCRoXJX19IVN+HiRo3fvE0WOnAjzlz43X4F8UJWFPbMJLK/OM9KWaGzAgMBAAECggEAZHaQmrQbrEemDhKj2e20LQSzaPkxdVQfgySKkHBmUAgwhLif/07vR7KU0VNJdA8v7TRD8t/RYUKEkCys7ORaj7C633hdIhyLcKAWoYWMKwQFnUHg8T6sAArTT0MoW/IfJBFu2Vn3GT0a9D0jOvL+HlzxpaX+52UdeaMgSI03RP/b0RBKRfmr69JnBq1tK5XuzHzLc6EsMT9PQ5JJWjdRtqPEsOlbyCQjQlGE3VFKAY8LOa5KCpz7r0eOSVif7oCMXv3EbCa8i7MN8njXtN3h0evqzHtJZyH1JJQcw12X3VFSY0J3w+Ng46vtSpA2/s4MomfJejuRf5wASdIjnGUL6QKBgQDw7rfJ14MQaL7WdD/3lL/SvJJLzUt4w/x7dPtm9ndySbnUEttPVUD5hCFnfdYtg4uqKUZGF88itLtza5Chb+ABUIp9IdPORgFvD+l9YAAMtcVnJiXniofEmvVwjUczOg7qBUJ51ubRhZEkd3Xf9nGfchmyBLFNzzhbJhCUhrLcdQKBgQC8aKmSd6PjIc28g4RAezqpPOQWSqsxD5PCtg4tE6U9pvJ6cudxHd0DaIkPf0BwD1nvF3NSl1X3/IMxQbB1E4ANtBkDeXMDCsHoD948XqSqgMWKVxnwQz4sl3F023mFuCX/q7pju4nhB/4jwe3KvO5p97E7KCViRRBcG8cOLH3ghwKBgQCiW/w2ZKjJ8gxIcGZ67R6nYLQlqN7nLwuCFr8kD4tG1TAJHfv0Zjs26jeoikA+w5rmvJHCwmCvvqNjkGUSpVWLDT+GO7mEE+D7evmZp4vhBM1WSXrZoZ0EfHhRtKL6fnF2erzlZlB9eUjqDia9GlJPZJC0Sj1BdhdANVKPBIab0QKBgEsccpXYqnZvUITZ7YyDVBSKGOgmJm9tpVuXlrkzvsmAV+SnEEuROz4Tm6iY84h5JkJiF/CSMoyll2u4o29ZMdDEvsAa19YboMgyI0fv9zeeFKKdLNMTC6NdULbklGLR0hxGSw1dg485z4BT3MfZYDbQr1BFJfoyTF5cGJQ2+ovbAoGBALXgxAFRrk0jOCTL0uSqOKpeKox25FhWgp8kXVmPXgwewmxC7v0M3uUpOBhegZsckTUJVNOM2uLVZywk/bnfMYnmOD1r6ATGh6NMMCMkGDsCpxQkR3xBFglSnlkpFecs5L5Yknnndhbf9ujvwgKPH084hzatx1hj06EQQ8uJaKVW',
        'app_cert_public_key' =>  resource_path('appCertPublicKey_2015121100960603.crt'), //应用公钥证书路径
        'ali_public_key' => resource_path('alipayCertPublicKey_RSA2.crt'), //支付宝公钥证书路径
        'alipay_root_cert' => resource_path('alipayRootCert.crt'), //支付宝根证书路径
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];
