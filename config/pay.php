<?php

return [
    'alipay' => [
        'app_id'         => '2015121100960603',
        'ali_public_key' => 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDDI6d306Q8fIfCOaTXyiUeJHkrIvYISRcc73s3vF1ZT7XN8RNPwJxo8pWaJMmvyTn9N4HQ632qJBVHf8sxHi/fEsraprwCtzvzQETrNRwVxLO5jVmRGi60j8Ue1efIlzPXV9je9mkjzOmdssymZkh2QhUrCmZYI/FCEa3/cNMW0QIDAQAB',
        'private_key'    => 'MIIEpQIBAAKCAQEApeOrj/xNOwQ7ColV1pfSglniEMNns35blnbpqEuIk+INi4Bl9DY3uYNjFDd7/i4uezGMHetYx0V6hsCkO0m8ZZZGg3MrSxwP5onnUkGf2X/8GpnYLnARAXXnqnT+EUJ9aaUiyC/6fOQVs175IxLuCWg/bZSW0MnfcgCfZVqVxDXj6pS61jLqY00b/HsZ0rapK5WkQJIIkvw8v9aJ6xSu/Um1nDXg++OZOVthTnVJPhE++KXKfG99nuFjArG3+f2wQyUYQg6o/GtiC2t9Z2JDyGOzIaTCvkgtce7Ia7vM1izc7Loa4OlSiXSFi0Sfc3bUNv8w3av4/KTy37hyS6xHtQIDAQABAoIBAQCim95DQKyvqgD53g8/UAkwb0zy46hWQQkkH6IArzHMzCw8z3qg/Th4Z3sKiSzIxpoXdkUD2vtmMgvd5R3XY/sBlWG/XnhUoshPUmRmtB8tw4/qv10yf/WbeejBpPabEpL+qLnEg4tFOwquje0m3Vpp7D8oehuvxAJ8rHGSl03xSsqdisPdLfE28ZMi9YP9TaqlNkeXuo5tWPS6zQ0vO0W2ciu+ApFUluHD5KTgqSQH2eRXjPIIL2DHxGRh2A7BdCg9lldg87bJF8c+l8/pM4P+JRUSLEu5+9AKQA73BwrYGRSeUEa2nLhQSPmvnbW6tdYwT+OwLAa1IDivl/0xsRyNAoGBAPlxR8py9GPzzXRTV3eEVp1rJSsS42EbHlgBEDyvo6kTJxxc9i4CA7zubIP10c29mxeVG8RQRyvzDyXM/CvXxvmyFuaG4Q2j1ylp699HY0/Rk5ScYqMnUcHGu6uotYCOWAda6t0krZCF4J5bpUomH3CY34dP2IAV582ad20KhR5HAoGBAKpAFiLBFWoUKtugey89e/Hu9NwP4sb7YMW7IRR09IEUddILYgVA7RHBm8lRAuFj4agBuOvSvJCfHcxIN7wZVui9HHj+X2ydYK6TxR0srKl+cB2pqeq9Vf8gDyisMMhSKSlupHM/CP9Ppm7z0WlH/L0n6ZoVgh59Ont8kiv6W7wjAoGAWhdV7IK0Td1iWR84ugvsFJL8K6B4yzu2K+bGbISrQYePWqkgqOFFZFlgjBCepAZVG6FZFABClFcHI4nzkgou7UQrDTut0PVZ4rVE4bGw5sU03jnVTkQHPUt/wLIAS9wdYxqtNQ3oOgiAZfGHs04tkMdGBGMMOMawoAuoEpP4HEUCgYEAg+2PebUIBCDGqVStwIizoGHcix8gS7OGZRNCahjLU69oMbEybwHF88mFEDbftYrx1YAoLU4rYyJ6M9AOqIs2Rros8zGi/obh4caOq7HvxpQ9Cy9rhYTcvAu603jDgKfyT7H2a3wAW9/8B+SWdTAckPP52LYsE7ZU+FYq6zthlOMCgYEAnbzHX+nKNfAWKzrul455bSRX4P4s5ap+tZ2PzhfgJsCdYS6KMGd/TA7SksVBLguKJXs8vuenFZU0Ka/o5frxU4e1sVoJPohnp0+HKwdlcTtVSRSY516f9qr953NzHqy4nlCEp/AntYOH3U8faIcgzLqAOJtSfAUdnrwtwmbvDls=',
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
