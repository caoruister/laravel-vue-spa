<?php

return [
    'alipay' => [
        'app_id'         => '2016102700767818',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAq54Z94tEyeNQ+pbMmrfqOLbli8mBh52Qdu4+hiOw+fRQm9LQFfbvC+czy/5ytbm/PAXKBQpVzE7mZqcQVt4rMHvqsraAwpIhKhwUtsEPBTPNkyxy3iEnx64tEWZMdsFQ8NoXQJcxwlS3nl+wI3ZLdzikqexwZ1lUAJYTlL3bdsyax31hQ6mtfErRdR0vxZogf3dZw2amB2Bhqwh8LzkDamr9Jg1ONSw9VSkXciZebhu3/+qSDhxt2KjtT2TfA0BEnna/ysuwWJk4JA0E4ZpC2cS+XavF3lOn098asTQjIaC6DTCh4dDLaA2SRy7FRNveEEO3WiH/ouaYs7w8LY/r/wIDAQAB',
        'private_key'    => 'MIIEogIBAAKCAQEAuH9gnf4cfVRAHcTh4blRVW5bTWnQepxkvCXGHRSR2At9lQ5Tuvl/kI/BqYuUliH5z3mzWTi0SdeB4Sv/xgNPUrIZ/QeswCQqWmZn2C7Eq0FOtbBw/hkx82hpE5SK1UHVWeL8VaaWxwVQxbo7cfaFhPdrBVjDdDciJ+GjvJLAWJNERD7DcXwq+4ZUwb2cypXSico5Zk2hM8PFMLOItWasnUB26DP1rLWDThbLmQy3RF5r4vXa5uli/Csw2IxAqX73HfIDMr1B1oLVE7PlC3rf8rH7CnazyBmn2ks4zi1Y1g8UgXakCxJuvVMs4GeDbSWZDLRRc2YXHz1C2qutEozxFwIDAQABAoIBAFnp4ek9hR7jJ1gaskaybNvoq2Bf2DVY8JLtCc70TltuxiYVVGMD4tJN7QC2wJQmPLuLQQeTZfGysF5PdhhHVqojmBzDV8JQHb/utl8Z88jOTBCpy3daSgio8sSTGNHzgomK4JTRWhvmEEY8i2nvzYROm/6AEskZcXDkO0rUbh772R0mGyvfJ8UZKrQ6Bs5q9mNwkbHyOtSW2HzCQ96/hDtdO3a6NvBl5FWsbwHN72NS1JUX7b5by/i5XObyRxlP6TnQj7oz9HimFoUxcloIA/wcyt07i8mGXWjZciGToA6B/52liFhcfIK8ifMFzt7vA7/8d3XS6Y741qswnVHnW/ECgYEA8u6MVMo/zpolXwvSkBKL17awSjzkKi3KUWpNlek0qlhqeSoefDFGnFI4gS6Cyt6qC+eWIU7gYDNqBNdZgUsG+4iIOf35qfJVykH+zL80OzKTdb/JtUzbLDNHHrNmAU6lJnlLDDW2VLl/vufPE14hgSvtPbngsxaO2zNgDHfcwC8CgYEAwmwfOqRthX0ctAnM2xnLkPzWUwMRRkzGppphW9BP5eNDHt63d0wOZoS5GjPNie1xDB5hbO727wvhPngq5nRuMyXTgtue4s4nS0ByXxGsXYaSQOOcrL/B6PqmCvar+w49BOsbDsHJrfWM36OmxyWQWu0D5sPA6su0syQjnnfQ+5kCgYB+U85lyUalCUOlyWAVy48s/bNu53s+89DhxYXTDxJ0AsZbe6ueqYEuiRMZGjapiGClECjh6UKExDe9jL7enUVkR/uPLKNH3Nz/8JGvpz5iCkrkUHdz8COJOKEjNec1htAa0bhVARlvtYbYn3Lvf2Os6ErWbnKKrpBbLLwlv67rwQKBgEXANJP9Wa2CbUHKIkyYvIePrfSqLRBjiwFKcZNW8NMw7Wuty3RpPOFazG2yGBNbtCr820cRlFW+lVisE/gJ3V9MOs2/rQkBnOdKf73LwWLsXJwbDKKNSSwkgF1+kcTIHuwczOBGdeyLI7c4JyVbPKbiUXwAzr1tx65dUMoRglBBAoGAc03IkZEIAiIkNxNu1dyWlNc0rCAO1jApAIL6mB+I8vphuMmbbfffLyweTqTzTCIYjAutZKY3PC8FOxSNZo8sZHWu4cStva187umgDncASLe03u4IN0c7E2q3WkSQwmac40ghNv8MigMQCcTbZ9fbyhEqyx/ZU2s+/50oNoe2e04=',
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
