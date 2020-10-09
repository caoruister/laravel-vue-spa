<template>
  <div class="container-fluid transparent signup">
    <div class="row">
      <div class="col-xs-12 ">
        <div class="signup-block ng-scope" ng-controller="Authentication.Signup" ng-init="isClaimedRequest='ng-init'; claimedBusinessId='-1'">
          <div class="signup-form">
            <div class="logo">
              <router-link :to="{ name: 'welcome' }">
                <i class="icon-logo5"></i>
              </router-link>
            </div>
            <div class="title">
              请输入以下注册信息
            </div>
            <form class="form-horizontal" id="signupForm" name="signupForm" @submit.prevent="register" @keydown="form.onKeydown($event)" novalidate>
              <div class="form-group">
                <div class="col-sm-12 label-text">用户名</div>
                <div class="col-sm-12">
                  <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
                  <has-error :form="form" field="name" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12 label-text">邮箱</div>
                <div class="col-sm-12">
                  <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
                  <has-error :form="form" field="email" />
                </div>
              </div>
              <div class="form-group last-group">
                <div class="col-sm-12 label-text">密码</div>
                <div class="col-sm-12 hover">
                  <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password">
                  <has-error :form="form" field="password" />
                </div>
              </div>
              <div class="form-group last-group">
                <div class="col-sm-12 label-text">确认密码</div>
                <div class="col-sm-12 hover">
                  <input v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-control" type="password" name="password_confirmation">
                  <has-error :form="form" field="password_confirmation" />
                </div>
              </div>

              <div class="form-group no-margin-bottom">
                <div class="col-sm-12">
                  <v-button :loading="form.busy" class="btn btn-three btn-signup pull-right">
                    注册
                  </v-button>
                </div>
              </div>
            </form>
          </div>
          <div class="sign-in">
            已注册账号?
            <router-link :to="{ name: 'login' }">
              登录
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Form from 'vform'
import LoginWithGithub from '~/components/LoginWithGithub'

export default {
  middleware: 'guest',

  components: {
    LoginWithGithub
  },

  metaInfo () {
    return { title: this.$t('register') }
  },

  data: () => ({
    form: new Form({
      name: '',
      email: '',
      password: '',
      password_confirmation: ''
    }),
    mustVerifyEmail: false
  }),

  methods: {
    async register () {
      // Register the user.
      const { data } = await this.form.post('/api/register')

      // Must verify email fist.
      if (data.status) {
        this.mustVerifyEmail = true
      } else {
        // Log in the user.
        const { data: { token } } = await this.form.post('/api/login')

        // Save the token.
        this.$store.dispatch('auth/saveToken', { token })

        // Update the user.
        await this.$store.dispatch('auth/updateUser', { user: data })

        // Redirect home.
        this.$router.push({ name: 'home' })
      }
    }
  }
}
</script>
