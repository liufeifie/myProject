var HelloMessage = React.createClass({
  render: function () {
    return (
       <div>
         <h1>hello world !</h1>
         <p>{this.props.name}</p>
         <p>{this.props.className}</p>
       </div>
    )
  }
})

var WebSite = React.createClass({
  render: function () {
    return (
       <Name name={this.props.name}/>,
       <Link site={this.props.site}/>
    )
  }
})
var Name = React.createClass({
  render: function () {
    return (
       <h1>{this.props.name}</h1>
    )
  }
})
var Link = React.createClass({
  render: function () {
    return (
       <h2>{this.props.site}</h2>
    )
  }
})


ReactDOM.render(
   <div>
     <HelloMessage name='组件' className='lei'/>
     <WebSite name='我的百度' site='www.baidu.com'/>
   </div>,
   document.getElementById('example')
)
