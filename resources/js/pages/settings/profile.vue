<template>

  <section class="client-profile is-business">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="info-block info-details no-margin-top">
            <div class="title">
              <i class="icon-my-profile-icon2"></i>个人信息
            </div>
            <form name="detailsForm" class="form-details ng-pristine ng-valid">
              <div class="row first-row">
                <div class="col-sm-12">
                  <div class="label-text">手机号码</div>
                  <div class="input-text ng-binding" ng-show="detailsMode=='Show'" ng-click="detailsMode = 'Edit'">
                    {{user.name}}
                  </div>
                  <input ng-show="detailsMode=='Edit'" ng-form-control="" class="form-control ng-pristine ng-untouched ng-valid ng-hide ng-not-empty" ng-model="details.firstName" name="firstName" id="firstName" ng-class="{'error': details.firstName == '' &amp;&amp; saveClicked,'success': details.firstName != '' &amp;&amp; saveClicked}">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="label-text">邮箱</div>
                  <div class="input-text ng-binding" ng-show="detailsMode=='Show'" ng-click="detailsMode = 'Edit'">
                    {{user.email}}
                  </div>
                  <input ng-show="detailsMode=='Edit'" ng-form-control="" class="form-control ng-pristine ng-untouched ng-valid ng-hide ng-not-empty" ng-model="details.email" name="email" id="email" ng-class="{'error': !isEmailValid(details.email) &amp;&amp; saveClicked,'success': isEmailValid(details.email) &amp;&amp; saveClicked}">
                </div>
              </div>
            </form>
            <div class="row buttons visible-lg visible-md">
              <div class="col-sm-12 text-right">
                <button class="btn btn-seven" ng-click="changeDetailsMode('Edit')" ng-show="detailsMode=='Show'">编辑</button>
                <button class="btn btn-seven ng-hide" ng-click="changeDetailsMode('Show')" ng-show="detailsMode=='Edit'">CANCEL</button>
                <button class="btn btn-three ng-hide" ng-click="saveDetails()" ng-show="detailsMode=='Edit'" data-loading-text="PROCESSING..." ng-bs-loading="isSaveBusy">SAVE</button>
              </div>
            </div>
            <div class="row buttons visible-xs visible-sm">
              <div class="col-xs-6">
                <button class="btn btn-seven ng-hide" ng-click="changeDetailsMode('Show')" ng-show="detailsMode=='Edit'">CANCEL</button>
              </div>
              <div class="col-xs-6 col-xs-offset-6" ng-class="{'col-xs-offset-6': detailsMode == 'Show'}">
                <button class="btn btn-seven" ng-click="changeDetailsMode('Edit')" ng-show="detailsMode=='Show'">编辑</button>
                <button class="btn btn-three hidden-xs ng-hide" ng-click="saveDetails()" ng-show="detailsMode=='Edit'" data-loading-text="PROCESSING..." ng-bs-loading="isSaveBusy">SAVE</button>
                <button class="btn btn-three visible-xs ng-hide" ng-click="saveDetails()" ng-show="detailsMode=='Edit'" data-loading-text="PROCESSING..." ng-bs-loading="isSaveBusy" ng-scroll-to-error=".form-details" ng-scroll-to-error-class=".error">SAVE</button>
              </div>
            </div>
          </div>
          <div class="info-block info-password">
            <div class="title">
              <i class="icon-my-profile-icon3"></i>账户信息
            </div>
            <form name="resetPasswordForm">
              <div class="row">
                <div class="col-sm-12">
                  <div class="label-text">总点数</div>
                  <div class="input-text">
                    {{user.deposit}}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="label-text">已使用点数</div>
                  <div class="input-text">
                    {{user.withdraw}}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="label-text">剩余点数</div>
                  <div class="input-text">
                    {{user.balance}}
                  </div>
                </div>
              </div>
            </form>
            <div class="row buttons visible-lg visible-md">
              <div class="col-sm-12 text-right">
                <button class="btn btn-seven">发票申请</button>
                <button class="btn btn-three" v-on:click="goRecharge">充值</button>
              </div>
            </div>
            <div class="row buttons visible-xs visible-sm">
              <div class="col-xs-6">
                <button class="btn btn-seven">发票申请</button>
              </div>
              <div class="col-xs-6">
                <button class="btn btn-three" v-on:click="goRecharge">充值</button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="info-block info-logo">
            <div class="logo">
              <img src="/images/user-placeholder.png">
            </div>
            <div class="title1">
              个人头像
            </div>
            <div class="title2">
            </div>
            <div class="title2 no-margin-top">
            </div>
            <div class="buttons">
              <button class="btn btn-seven ng-hide" ng-click="removeLogo()" ng-show="isLogoExist">删除</button>
              <button class="btn btn-seven" ng-show="!isLogoExist">编辑</button>
              <div class="fileUpload btn btn-six ng-hide">
              </div>
              <div class="progress ng-hide" ng-show="file.uploading">
                <div class="progress-bar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" ng-style="{'width' : file.progressValue + '%'}" style="width: 0%;">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</template>

<script>
import Form from 'vform'
import { mapGetters } from 'vuex'

export default {
  scrollToTop: false,

  metaInfo () {
    return { title: this.$t('settings') }
  },

  data: () => ({
    form: new Form({
      name: '',
      email: ''
    })
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  created () {
    // Fill the form with user data.
    this.form.keys().forEach(key => {
      this.form[key] = this.user[key]
    })

    // Fetch the user.
    this.$store.dispatch('auth/fetchUser')
  },

  methods: {
    async update () {
      const { data } = await this.form.patch('/api/settings/profile')

      this.$store.dispatch('auth/updateUser', { user: data })
    },

    goRecharge () {
      this.$router.push({ name: 'recharge' })
    }
  }
}
</script>

<style lang="scss" scoped>
  @media (max-width: 991px) {
    .client-profile .container .col-md-12 {
      padding-left: 0;
      padding-right: 0;
    }
  }
</style>
