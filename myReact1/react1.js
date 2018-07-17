let i = 2
let myStyle = {
  fontSize: 36,
  color: '#ff0000'
}
let arr = [
   <h1>数组元素1</h1>,
   <h1>数组元素2</h1>
]
ReactDOM.render(
   <div>
     <h1>鲁旭学习</h1>
     <h2>欢迎学习 react</h2>
     <p data-myattribute="some_value">这是一个很不错的javascript 库</p>
     <p>js表达式，加法运算1+1={1 + 1}</p>
     <p>{i === 1 ? 'true!' : 'false!'}</p>
     <p style={myStyle}>myStyle 内联样式</p>
     {/*注释*/}
     <p>注释需要写在花括号中</p>
     <p>{arr}</p>
     <p>React 的 JSX 使用大、小写的约定来区分本地组件的类和 HTML 标签。</p>

   </div>,
   document.getElementById('example')
)