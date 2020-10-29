<template>
  <div class="container-fluid transparent signup">
    <div class="row">
      <div class="col-md-12">
        <div class="confirmation-sent" v-show="isPayed">
          <div class="icon">
            <i class="icon-auth-icon4"></i>
          </div>
          <div class="title1">支付成功</div>
          <div class="title2">
            请返回 个人设置 查看账户点数
          </div>
          <router-link :to="{ name: 'settings.profile' }" class="btn btn-three">
            返回个人设置
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from "axios";
  import {mapGetters} from "vuex";

  const qs = (params) => Object.keys(params).map(key => `${key}=${params[key]}`).join('&')

  export default {
    middleware: 'auth',

    metaInfo() {
      return {
        title: '支付成功'
      }
    },

    data: () => ({
      title: window.config.appName,
      isPayed: false,
      error: ''
    }),

    computed: {
      ...mapGetters({
        authenticated: 'auth/check',
        user: 'auth/user'
      })
    },

    async beforeRouteEnter(to, from, next) {
      try {
        if (to.query.sign) {
          const {data} = await axios.get(`/api/payment/alipay/return?${qs(to.query)}`)

          next(vm => {
            vm.isPayed = data.isPayed
          })
        } else {
          next()
        }
      } catch (e) {
        next(vm => {
          vm.error = e.response.data
        })
      }
    },
  }
</script>

<style scoped>

</style>
