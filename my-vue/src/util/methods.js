export default {
  methods: {
    /**
     * cookes option
     */
    setCookie (name, value, days) {
      if (typeof window === 'undefined') return
      let d = new Date()
      d.setTime(d.getTime() + 24 * 60 * 60 * 1000 * days)
      window.document.cookie = name + '=' + value + ';path=/;expires=' + d.toGMTString()
    },
    getCookie (name) {
      let reg = new RegExp('(^| )' + name + '=([^;]*)(;|$)')
      let arr = document.cookie.match(reg)
      if (arr) { return unescape(arr[2]) } else { return null }
    },
    delCookie (name) {
      var exp = new Date()
      exp.setTime(exp.getTime() - 1)
      var cval = this.getCookie(name)
      if (cval != null) { document.cookie = name + '=' + cval + ';path=/;expires=' + exp.toGMTString() }
    },
    /**
     * session|localStorage option
     */
    setLocalItem (name, val) {
      if (typeof val === 'object') val = JSON.stringify(val)
      window.localStorage.setItem(name, val)
    },
    setSessionItem (name, val) {
      if (typeof val === 'object') val = JSON.stringify(val)
      window.sessionStorage.setItem(name, val)
    },
    getLocalItem (name) {
      return JSON.parse(window.localStorage.getItem(name))
    },
    getSessionItem (name) {
      return JSON.parse(window.sessionStorage.getItem(name))
    },
    delLocalItem (name) {
      window.localStorage.removeItem(name)
    },
    delSessionItem (name) {
      window.sessionStorage.removeItem(name)
    },
    clearCache () {
      window.sessionStorage.clear()
      window.localStorage.clear()
    },
    /**
     * 路由跳转
     * */
    goPush (path, status) {
      status ? window.location.href = window.location.pathname + window.location.hash + path : this.$router.push(path)
    },
    goReplace (path, status) {
      status ? window.location.href = window.location.pathname + window.location.hash + path : this.$router.goReplace(path)
    }
  }
}