var updatingChart = $(".updating-chart").peity("line")

setInterval(function() {
  var random = Math.round(Math.random() * 10)
  var values = updatingChart.text().split(",")
  values.shift()
  values.push(random)

  updatingChart
      .text(values.join(","))
      .change()
}, 1000)

$(".line").peity("line")

$(".bar").peity("bar")

$('.donut').peity('donut')

$(".data-attributes span").peity("donut")

$("span.pie").peity("pie")

$(".bar-colours-1").peity("bar", {
  fill: ["#7e37d8", "#fe80b2", "#80cf00"],
  width: '100',
  height: '82'
})

$(".bar-colours-2").peity("bar", {
  fill: function(value) {
    return value > 0 ? "#7e37d8" : "#06b5dd"
  },
  width: '100',
  height: '82'
})

$(".bar-colours-3").peity("bar", {
  fill: function(_, i, all) {
    var g = parseInt((i / all.length) * 216)
    return "rgb(216, " + g + ", 0.5)"
  },
  width: '100',
  height: '82'
})

$(".pie-colours-1").peity("pie", {
  fill: ["#7e37d8", "#fe80b2", "#06b5dd", "#fd517d"],
  width: '100',
  height: '82'
})
