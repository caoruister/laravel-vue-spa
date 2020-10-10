<template>

  <section class="client-profile is-business">
    <div class="container">
      <div class="row" ng-show="!isBusy">
        <div class="col-md-8">
          <div class="info-block info-details no-margin-top">
            <div class="title">
              <i class="icon-my-profile-icon2"></i>个人信息
            </div>
            <form name="detailsForm" class="form-details ng-pristine ng-valid">
              <div class="row first-row">
                <div class="col-sm-12">
                  <div class="label-text">用户名</div>
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
              <div class="row">
                <div class="col-sm-12">
                  <div class="label-text">手机号码</div>
                  <div class="input-text ng-binding" ng-show="detailsMode=='Show'" ng-click="detailsMode = 'Edit'">

                  </div>
                  <input ng-show="detailsMode=='Edit'" ng-form-control="" class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-hide" ng-model="details.phone" name="phone" id="phone" ng-class="{'error': details.phone == '' &amp;&amp; saveClicked,'success': details.phone != '' &amp;&amp; saveClicked}">
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
                <button class="btn btn-seven" ng-click="changeDetailsMode('Edit')" ng-show="detailsMode=='Show'">EDIT</button>
                <button class="btn btn-three hidden-xs ng-hide" ng-click="saveDetails()" ng-show="detailsMode=='Edit'" data-loading-text="PROCESSING..." ng-bs-loading="isSaveBusy">SAVE</button>
                <button class="btn btn-three visible-xs ng-hide" ng-click="saveDetails()" ng-show="detailsMode=='Edit'" data-loading-text="PROCESSING..." ng-bs-loading="isSaveBusy" ng-scroll-to-error=".form-details" ng-scroll-to-error-class=".error">SAVE</button>
              </div>
            </div>
          </div>
          <div class="info-block info-password">
            <div class="title">
              <i class="icon-my-profile-icon3"></i>更改密码
            </div>
            <form name="resetPasswordForm" class="ng-pristine ng-valid">
              <div class="row ng-hide" ng-show="passwordMode=='Edit'">
                <div class="col-sm-12">
                  <div class="label-text">old password</div>
                  <input ng-form-control="" class="form-control ng-pristine ng-untouched ng-valid ng-empty" ng-model="oldPassword" name="oldPassword" id="oldPassword" type="password" ng-class="{'error': (oldPassword == '' || oldPassword.length < 6) &amp;&amp; resetClicked,'success': (oldPassword != '' &amp;&amp; oldPassword.length >= 6) &amp;&amp; resetClicked}">
                </div>
              </div>
              <div class="row ng-hide" ng-show="passwordMode=='Edit'">
                <div class="col-sm-12">
                  <div class="label-text">new password</div>
                  <input ng-form-control="" class="form-control ng-pristine ng-untouched ng-valid ng-empty" ng-model="newPassword" name="newPassword" id="newPassword" type="password" ng-class="{'error': (newPassword == '' || newPassword.length < 6 || newPassword != confirmedPassword) &amp;&amp; resetClicked,'success': (newPassword != '' &amp;&amp; newPassword.length >= 6 &amp;&amp; newPassword == confirmedPassword) &amp;&amp; resetClicked}">
                </div>
              </div>
              <div class="row ng-hide" ng-show="passwordMode=='Edit'">
                <div class="col-sm-12">
                  <div class="label-text">confirmed password</div>
                  <input ng-form-control="" class="form-control ng-pristine ng-untouched ng-valid ng-empty" ng-model="confirmedPassword" name="confirmedPassword" id="confirmedPassword" type="password" ng-class="{'error': (confirmedPassword == '' || confirmedPassword.length < 6 || newPassword != confirmedPassword) &amp;&amp; resetClicked,'success': (confirmedPassword != '' &amp;&amp; confirmedPassword.length >= 6 &amp;&amp; newPassword == confirmedPassword) &amp;&amp; resetClicked}">
                </div>
              </div>
            </form>
            <div class="row buttons visible-lg visible-md">
              <div class="col-sm-12 text-right">
                <button class="btn btn-seven" ng-click="passwordMode = 'Edit'" ng-show="passwordMode=='Show'">编辑</button>
                <button class="btn btn-seven ng-hide" ng-click="cancelReset()" ng-show="passwordMode=='Edit'">CANCEL</button>
                <button class="btn btn-three ng-hide" ng-show="passwordMode=='Edit'" ng-click="resetPassword()" data-loading-text="PROCESSING..." ng-bs-loading="isResetBusy">SAVE</button>
              </div>
            </div>
            <div class="row buttons visible-xs visible-sm">
              <div class="col-xs-6">
                <button class="btn btn-seven ng-hide" ng-click="cancelReset()" ng-show="passwordMode=='Edit'">CANCEL</button>
              </div>
              <div class="col-xs-6 col-xs-offset-6" ng-class="{'col-xs-offset-6': passwordMode == 'Show'}">
                <button class="btn btn-seven" ng-click="passwordMode = 'Edit'" ng-show="passwordMode=='Show'">EDIT</button>
                <button class="btn btn-three ng-hide" ng-show="passwordMode=='Edit'" ng-click="resetPassword()" data-loading-text="PROCESSING..." ng-bs-loading="isResetBusy">SAVE</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info-block info-logo">
            <div class="logo">
              <img ng-src="https://topvet.blob.core.windows.net/clients/user-placeholder.png" src="https://topvet.blob.core.windows.net/clients/user-placeholder.png">
            </div>
            <div class="title1">
              个人头像
            </div>
            <div class="title2">
              Upload a Profile Image
            </div>
            <div class="title2 no-margin-top">
              JPG or PNG up to 5MB
            </div>
            <div class="buttons">
              <button class="btn btn-seven ng-hide" ng-click="removeLogo()" ng-show="isLogoExist">删除</button>
              <button class="btn btn-seven" ng-show="!isLogoExist">删除</button>
              <div class="fileUpload btn btn-six">
                <span>上传</span><i class="icon-my-profile-icon1"></i>
                <input type="file" class="upload" name="files[]" title=" " ng-jq-upload="/clientprofile/clientlogoupload" ng-jq-upload-starting="file.start($data)" ng-jq-upload-success="file.success($data)" ng-jq-upload-error="file.fail($data)" ng-jq-upload-end="file.end()" ng-jq-upload-progress="file.progress($data)" ng-jq-upload-max-file-size="10240000">
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
  },

  methods: {
    async update () {
      const { data } = await this.form.patch('/api/settings/profile')

      this.$store.dispatch('auth/updateUser', { user: data })
    }
  }
}
</script>
