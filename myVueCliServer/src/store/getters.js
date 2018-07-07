export default {
  SERVER_DATA: (state) => (key) => {
    if (key) return state.serverData[key]
    return state.serverData
  }
}
