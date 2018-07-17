export default {
  SET_USER_INFO: (state, data) => {
    state.userInfo = data
  },
  SET_HEADER: (state, status) => {
    state.header = status
  },
  SET_FOOTER: (state, status) => {
    state.footer = status
  },
  PAGE_TITLE: (state, title) => {
    state.pageTitle = title
  },
  HEADER_LEFT: (state, data) => {
    if (!data) {
      state.headerLeft = {}
      return
    }
    let tmp = {}
    if (typeof data.html !== 'undefined') tmp.html = data.html
    if (typeof data.even === 'function') tmp.even = data.even
    state.headerLeft = tmp
  },
  HEADER_RIGHT: (state, data) => {
    if (!data) {
      state.headerRight = {}
      return
    }
    let tmp = {}
    if (typeof data.html !== 'undefined') tmp.html = data.html
    if (typeof data.even === 'function') tmp.even = data.even
    state.headerRight = tmp
  }
}