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
              Welcome, tell us about yourself.
            </div>
            <form class="form-horizontal" id="signupForm" name="signupForm" @submit.prevent="register" @keydown="form.onKeydown($event)" novalidate>
              <div class="form-group">
                <div class="col-sm-12 label-text">NAME</div>
                <div class="col-sm-12">
                  <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-control" type="text" name="name">
                  <has-error :form="form" field="name" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12 label-text">Email</div>
                <div class="col-sm-12">
                  <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" type="email" name="email">
                  <has-error :form="form" field="email" />
                </div>
              </div>
              <div class="form-group last-group">
                <div class="col-sm-12 label-text">Password</div>
                <div class="col-sm-12 hover">
                  <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" type="password" name="password">
                  <has-error :form="form" field="password" />
                </div>
              </div>
              <div class="form-group last-group">
                <div class="col-sm-12 label-text">Password Confirmation</div>
                <div class="col-sm-12 hover">
                  <input v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-control" type="password" name="password_confirmation">
                  <has-error :form="form" field="password_confirmation" />
                </div>
              </div>

              <div class="form-group no-margin-bottom">
                <div class="col-sm-12">
                  <v-button :loading="form.busy" class="btn btn-three btn-signup pull-right">
                    {{ $t('register') }}
                  </v-button>
                </div>
              </div>
            </form>
          </div>
          <div class="sign-in">
            Already a member?
            <router-link :to="{ name: 'login' }">
              {{ $t('login') }}
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
