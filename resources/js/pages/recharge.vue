<template>
  <section class="settings">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="info-block info-details">
            <div class="row no-margin-top">
              <div class="col-xs-12 col-sm-6">
                <div class="title title1">
                  <i class="icon-booking-icon8"></i> 充值中心
                </div>
              </div>
            </div>
            <form class="form-horizontal form-details" name="rechargeForm" autocomplete="off">
              <div class="row first-row1">
                <div class="col-sm-12 col-md-6">
                  <div class="label-text">填入预付金额</div>
                  <input type="text" class="form-control" name="money" v-model="form.money" placeholder="请输入充值金额">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <h3>充值说明</h3>
                  <p>本站提供<b>在线支付</b>、银行电子汇款两种种支付方式 （在线支付实时到账，无须传真底单，建议使用！）

                    <br>选择公司转账的用户，需要联系我司客服，请勿自行转帐。否则将不能为您及时入款。

                    <br>如果您需要索取发票，<b>请确保会员所有人名称与发票抬头必须相同。如您会员帐户是个人性质，且需要索取公司抬头的发票，请在申请发票时将抬头写为公司名称。</b>发票需要在付款后3个月以内索取。

                    <br><b>人民银行最新规定：自2016/12/1起，个人通过ATM等自助柜员机转账（本人同行账户除外），24小时后才能到账。为避免汇款不能及时到账延误您业务办理，推荐您选择快捷高效的“在线支付方式”。</b>
                  </p>
                </div>
              </div>
              <div class="row buttons">
                <div class="col-sm-12 text-right">
                  <a class="btn btn-three"
                     style="background-color: #03b1f5;" v-on:click="pay">
                    <i class="iconfont icon-alipay-fill"></i>
                    支付宝支付
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  import {mapGetters} from 'vuex'
  import Form from "vform"
  import axios from "axios"

  export default {
    layout: 'basic',

    middleware: 'auth',

    data: () => ({
      title: window.config.appName,
      form: new Form({
        money: 100,
      }),
      error: ''
    }),

    computed: {
      ...mapGetters({
        authenticated: 'auth/check',
        user: 'auth/user'
      })
    },

    methods: {
       async pay () {
          const {data} = await axios.post(`/api/payment/alipay`,
            {
              amount: this.form.money,
            }
          )

         const div = document.createElement('div');
         div.innerHTML = data;
         document.body.appendChild(div);
         div.style.display = "none";
         document.forms['alipay_submit'].submit();
      }
    }
  }
</script>

<style lang="scss" scoped>

</style>
