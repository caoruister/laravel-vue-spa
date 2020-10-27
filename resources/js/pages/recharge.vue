<template>
  <section class="client-profile is-business">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="main animated fadeInUp">
            <div class="main_title">充值中心</div>
            <form class="layui-form"><input type="hidden" name="type" value="alipay">
              <div class="api_form">
                <ul>
                  <li><h3>填入预付金额：</h3>
                    <p class="form_txt"><input type="text" name="money" value="100"></p></li>
                  <li><h3>付款方式：</h3>
                    <div class="payment_choose"><a class="active" onclick="changePayType('alipay')"><i
                      class="iconfont icon-alipay-fill"></i>支付宝</a></div>
                  </li>
                  <li><p class="agree"><label><span></span>我已了解：充值的款项只可用于91VPS消费，不支持提现！</label></p></li>
                  <li id="online">
                    <button class="api_btn pay_btn filter_btn_disabled" disabled="" lay-filter="submitPay"
                            lay-submit="">开始充值
                    </button>
                  </li>
                </ul>
              </div>
            </form>
            <div class="re_tip"><h3>充值说明</h3>
              <p>本站提供<b>在线支付</b>、银行电子汇款两种种支付方式 （在线支付实时到账，无须传真底单，建议使用！）

                <br>选择公司转账的用户，需要联系我司客服，请勿自行转帐。否则将不能为您及时入款。

                <br>如果您需要索取发票，<b>请确保会员所有人名称与发票抬头必须相同。如您会员帐户是个人性质，且需要索取公司抬头的发票，请在申请发票时将抬头写为公司名称。</b>发票需要在付款后3个月以内索取。

                <br><b>人民银行最新规定：自2016/12/1起，个人通过ATM等自助柜员机转账（本人同行账户除外），24小时后才能到账。为避免汇款不能及时到账延误您业务办理，推荐您选择快捷高效的“在线支付方式”。</b>
              </p></div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  export default {
    name: "recharge"
  }
</script>

<style scoped>

</style>
