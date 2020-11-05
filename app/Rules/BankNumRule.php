<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class BankNumRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * 16-19 位卡号校验位采用 Luhn 校验方法计算：
     *   第一步：把信用卡号倒序（61789372994）
     *   第二步：取出倒序后的奇数位置上的号码， 相加等到总和s1。（eg:s1=6+7+9+7+9+4=42)
     *   第三步：取出倒序后的偶数位置上的号码，每个号码乘以2。   (eg:2,16,6,4,18)
     *   第四步：把第三步得到的大于10的号码转化为个位+十位。（eg:2,7,6,4,9)
     *   第五步：把处理好的偶数位号码相加，得到s2。 (eg:s2=2+7+6+4+9=28)
     *   第六步：判读(s1+s2)%10 == 0则有效，否则无效。（有效）
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        // step1 判断是否16到19位
        $pattern = '/^\d{16,19}$/';
        if (!preg_match($pattern,$value)) {
            return false;
        }

        // step2 luhn 算法校验
        $len = strlen($value);
        $sum = 0;
        for ($i = 0; $i < $len ; $i++)
        {
            if (($i + $len) & 1)
            { // 奇数
                $sum += ord($value[$i]) - ord('0');
            }
            else
            { // 偶数
                $tmp = (ord($value[$i]) - ord('0')) * 2;
                $sum += floor($tmp / 10) + $tmp % 10;
            }
        }

        return $sum % 10 === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '银行卡号码不合法';
    }
}
