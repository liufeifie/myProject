export default {
  SERVER_DATA (state, data) {
    state.serverData[data.key] = data.data
  }
}
