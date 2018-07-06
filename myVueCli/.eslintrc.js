// https://eslint.org/docs/user-guide/configuring

module.exports = {
  root: true,
  parserOptions: {
    parser: 'babel-eslint'
  },
  env: {
    browser: true,
  },
  extends: [
    // https://github.com/vuejs/eslint-plugin-vue#priority-a-essential-error-prevention
    // consider switching to `plugin:vue/strongly-recommended` or `plugin:vue/recommended` for stricter rules.
    'plugin:vue/essential',
    // https://github.com/standard/standard/blob/master/docs/RULES-en.md
    'standard'
  ],
  // required to lint *.vue files
  plugins: [
    'vue'
  ],
  // add your custom rules here
  rules: {
    'eol-last': 0, // end of life 不需要换行（换行为0）
    'indent': 0, // 缩进风格
    'padded-blocks': 0, // 块语句内行首行尾要空行
    'no-multiple-empty-lines': [1, {"max": 3}], // [1, {"max": 2}],//空行最多不能超过2行
    'no-unused-vars': 0, // 没有使用的变量
    'no-mixed-spaces-and-tabs':0, // 禁止空格和 tab 的混合缩进
    'prefer-promise-reject-errors': 0, // Promise 的 reject 中可以字面量或传入 Error 对象
    // allow paren-less arrow functions
    'arrow-parens': 0, // 允许箭头函数参数使用括号
    // allow async-await
    'generator-star-spacing': 0, // 生成器函数前后空格
    'no-inner-declarations':[0], // 允许在嵌套代码块里声明函数
    // allow debugger during development
    'no-debugger': process.env.NODE_ENV === 'production' ? 'error' : 'off'
  }
}
