<template>
  <div class="pl15 pr15 pb10">
    <h3 class="mt10 f14">一、Flex 布局是什么？</h3>
    <p class="mt5 f12">Flex 是 Flexible Box 的缩写，意为"弹性布局"，用来为盒状模型提供最大的灵活性。任何一个容器都可以指定为 Flex 布局。</p>
    <p class="mt5 f12">行内元素也可以使用 Flex 布局: <b class="fbold">display: inline-flex;</b></p>
    <p class="mt5 f12">块级元素可以使用 Flex 布局:  <b class="fbold">display: flex;</b></p>
    <p class="mt5 f12">Webkit 内核的浏览器，必须加上-webkit前缀:</p>
    <p class="f12 fbold tr">display: -webkit-flex; /* Safari */   display: flex;</p>
    <p class="mt5 f1 fbold col02">注意，设为 Flex 布局以后，子元素的float、clear和vertical-align属性将失效。</p>
    <h3 class="mt10 f14">二、容器的属性</h3>
    <p class="f12 lh20">
      <b class="fbold">2.1 flex-direction: row | row-reverse | column | column-reverse; </b> <br>
        属性决定主轴的方向（即项目的排列方向）。<br>
      <img src="../../../assets/image/person/flex/flex_direction.png" alt="" width="100%"><br>
      row（默认值）：主轴为水平方向，起点在左端。<br>
      row-reverse：主轴为水平方向，起点在右端。<br>
      column：主轴为垂直方向，起点在上沿。<br>
      column-reverse：主轴为垂直方向，起点在下沿。<br>

      <b class="fbold">2.2  flex-wrap: nowrap | wrap | wrap-reverse;</b> <br>
      默认情况下，项目都排在一条线（又称"轴线"）上。flex-wrap属性定义，如果一条轴线排不下，如何换行。<br>
      （1）nowrap（默认）：不换行。<br>
      <img src="../../../assets/image/person/flex/nowrap.png" alt="" width="100%"><br>
      （2）wrap：换行，第一行在上方。<br>
      <img src="../../../assets/image/person/flex/wrap.jpg" alt="" width="100%"><br>
      （3）wrap-reverse：换行，第一行在下方。<br>
      <img src="../../../assets/image/person/flex/wrap-reverse.jpg" alt="" width="100%"><br>

      <b class="fbold" v-text="'2.3 flex-flow: <flex-direction> || <flex-wrap>;'"></b> <br>
      flex-flow属性是flex-direction属性和flex-wrap属性的简写形式，默认值为row nowrap <br>

      <b class="fbold" v-text="'2.4 justify-content: flex-start | flex-end | center | space-between | space-around;'"></b> <br>
      justify-content属性定义了项目在主轴上的对齐方式。<br>
      <img src="../../../assets/image/person/flex/justify-content.png" alt="" width="100%"><br>
      flex-start（默认值）：左对齐 <br>
      flex-end：右对齐 <br>
      center： 居中 <br>
      space-between：两端对齐，项目之间的间隔都相等。 <br>
      space-around：每个项目两侧的间隔相等。所以，项目之间的间隔比项目与边框的间隔大一倍。 <br>

      <b class="fbold" v-text="'2.5 align-items: flex-start | flex-end | center | baseline | stretch;'"></b> <br>
      align-items属性定义项目在交叉轴上如何对齐。<br>
      <img src="../../../assets/image/person/flex/align-items.png" alt="" width="100%"><br>
      flex-start：交叉轴的起点对齐。<br>
      flex-end：交叉轴的终点对齐。<br>
      center：交叉轴的中点对齐。<br>
      baseline: 项目的第一行文字的基线对齐。<br>
      stretch（默认值）：如果项目未设置高度或设为auto，将占满整个容器的高度。<br>

      <b class="fbold" v-text="'2.6  align-content: flex-start | flex-end | center | space-between | space-around | stretch;'"></b> <br>
      align-content属性定义了多根轴线的对齐方式。如果项目只有一根轴线，该属性不起作用。<br>
      <img src="../../../assets/image/person/flex/align-content.png" alt="" width="100%"><br>
      flex-start：与交叉轴的起点对齐。<br>
      flex-end：与交叉轴的终点对齐。<br>
      center：与交叉轴的中点对齐。<br>
      space-between：与交叉轴两端对齐，轴线之间的间隔平均分布。<br>
      space-around：每根轴线两侧的间隔都相等。所以，轴线之间的间隔比轴线与边框的间隔大一倍。<br>
      stretch（默认值）：轴线占满整个交叉轴。<br>
    </p>
    <h3 class="mt10 f14">三、项目的属性</h3>
    <p class="f12 lh20">
      <b class="fbold" v-text="'3.1  order: <integer>;'"></b> <br>
      order属性定义项目的排列顺序。数值越小，排列越靠前，默认为0。<br>
      <img src="../../../assets/image/person/flex/order.png" alt="" width="100%"><br>

      <b class="fbold" v-text="'3.2 flex-grow: <number>; /* default 0 */'"></b> <br>
      flex-grow属性定义项目的放大比例，默认为0，即如果存在剩余空间，也不放大。<br>
      <img src="../../../assets/image/person/flex/flex-grow.png" alt="" width="100%"><br>
      如果所有项目的flex-grow属性都为1，则它们将等分剩余空间（如果有的话）。如果一个项目的flex-grow属性为2，其他项目都为1，则前者占据的剩余空间将比其他项多一倍。<br>

      <b class="fbold" v-text="'3.3 flex-shrink: <number>; /* default 1 */'"></b> <br>
      flex-shrink属性定义了项目的缩小比例，默认为1，即如果空间不足，该项目将缩小。<br>
      <img src="../../../assets/image/person/flex/flex-shrink.jpg" alt="" width="100%"><br>
      如果所有项目的flex-shrink属性都为1，当空间不足时，都将等比例缩小。如果一个项目的flex-shrink属性为0，其他项目都为1，则空间不足时，前者不缩小。
      负值对该属性无效。<br>

      <b class="fbold" v-text="'3.4 flex-basis: <length> | auto; /* default auto */'"></b> <br>
      flex-basis属性定义了在分配多余空间之前，项目占据的主轴空间（main size）。浏览器根据这个属性，计算主轴是否有多余空间。它的默认值为auto，即项目的本来大小。<br>
      它可以设为跟width或height属性一样的值（比如350px），则项目将占据固定空间。<br>

      <b class="fbold" v-text="'3.5  flex: none | [ <\'flex-grow\'> <\'flex-shrink\'>? || <\'flex-basis\'> ]'"></b> <br>
      flex属性是flex-grow, flex-shrink 和 flex-basis的简写，默认值为0 1 auto。后两个属性可选。<br>
      该属性有两个快捷值：auto (1 1 auto) 和 none (0 0 auto)。<br>
      建议优先使用这个属性，而不是单独写三个分离的属性，因为浏览器会推算相关值。<br>

      <b class="fbold" v-text="'3.6 align-self: auto | flex-start | flex-end | center | baseline | stretch;'"></b> <br>
      align-self属性允许单个项目有与其他项目不一样的对齐方式，可覆盖align-items属性。默认值为auto，表示继承父元素的align-items属性，如果没有父元素，则等同于stretch。<br>
      <img src="../../../assets/image/person/flex/align-self.png" alt="" width="100%"><br>
      该属性可能取6个值，除了auto，其他都与align-items属性完全一致。<br>
    </p>
    <p class="f1_5 tr "><router-link to="/person/flex/check" @click="test">测试flex布局</router-link></p>
  </div>
</template>
<script>
  export default {
    data: () => {
      return {}
    },
    pageConfig () {
      return {
        title: 'flex弹性布局',
        bodyStyle: 'background-color:  #f3f3f3;'
      }
    },
    created () {
    },
    mounted () {
      this.$store.commit('HEADER_RIGHT', {
        html: '<a class="color04" href="http://www.ruanyifeng.com/blog/2015/07/flex-grammar.html">链接</a>',
        even: ''
      })
    },
    methods: {
      test () {
        console.log(1111)
      }
    },
    components: {}

  }
</script>

<style type="text/css">

</style>