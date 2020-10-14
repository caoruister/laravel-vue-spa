<template>
  <div class="container-fluid signup">
    <div class="row">
      <div class="col-xs-12">
        <div class="signup-block">
          <div class="signup-form">
            <div class="logo">
              <router-link :to="{ name: 'welcome' }">
                <i class="icon-logo5"></i>
              </router-link>
            </div>
            <div class="title">
              欢迎回来，请登录
            </div>
            <form class="form-horizontal" id="loginForm"
                  name="loginForm" @submit.prevent="login" @keydown="form.onKeydown($event)" novalidate>
              <div class="form-group">
                <div class="col-sm-12 label-text">手机号码</div>
                <div class="col-sm-12">
                  <input v-model="form.phone" :class="{ 'error': form.errors.has('phone') }" class="form-control" type="text" name="phone">
                  <has-error :form="form" field="phone" />
                </div>
              </div>
              <div class="form-group last-group hidden-xs">
                <div class="col-sm-12 label-text">密码</div>
                <div class="col-sm-12">
                  <input v-model="form.password" :class="{ 'error': form.errors.has('password') }" class="form-control" type="password" name="password">
                  <has-error :form="form" field="password" />
                </div>
              </div>
              <div class="form-group visible-xs">
                <div class="col-sm-12 label-text">密码</div>
                <div class="col-sm-12">
                  <input v-model="form.password" :class="{ 'error': form.errors.has('password') }" class="form-control" type="password" name="password">
                  <has-error :form="form" field="password" />
                </div>
              </div>
              <div class="row last-group visible-xs">
                <div class="col-sm-12">
                  <div class="sign-in no-margin-bottom no-margin-top">
                    <div class="pull-right">
                      <router-link :to="{ name: 'password.request' }">
                        忘记密码
                      </router-link>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                  <button class="btn btn-three btn-login pull-right">
                    登录
                  </button>
                  <label v-bind:class="{'selected': remember}">
<span class="custom-checkbox" v-bind:class="{'selected': remember}">
<input type="checkbox" v-model="remember">
</span>
                    <span class="custom-checkbox-span ">记住我</span>
                  </label>
                </div>
              </div>
            </form>
          </div>
          <div class="sign-in hidden-xs">
            <div class="right-block">
              <router-link :to="{ name: 'password.request' }">
                忘记密码
              </router-link>
            </div>
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
    return { title: this.$t('login') }
  },

  data: () => ({
    form: new Form({
      phone: '',
      password: ''
    }),
    remember: true
  }),

  methods: {
    async login () {
      // Submit the form.
      const { data } = await this.form.post('/api/login')

      this.message = data.message

      // Save the token.
      this.$store.dispatch('auth/saveToken', {
        token: data.token,
        remember: this.remember
      })

      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')

      // Redirect home.
      this.$router.push({ name: 'home' })
    }
  }
}
</script>
<style scoped>

</style>
