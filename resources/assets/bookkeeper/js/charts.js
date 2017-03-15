Chart.defaults.global.responsive = true;
Chart.defaults.global.defaultFontFamily = '"Lato", sans-serif';
Chart.defaults.global.defaultFontColor = '#7F8C8D';
Chart.defaults.global.tooltips.backgroundColor = '#161A20';
Chart.defaults.global.legend.position = 'bottom';
Chart.defaults.global.legend.labels.boxWidth = 16;
Chart.defaults.global.legend.labels.padding = 32;
Chart.defaults.global.legend.labels.usePointStyle = true;
Chart.defaults.global.legend.labels.fontSize = 10;

window.chartDisplayDefaults = {
    fill: false,
    pointRadius: 6,
    pointHoverRadius: 8,
    pointBackgroundColor: "#FFFFFF",
    pointHoverBackgroundColor: "#FFFFFF",
    pointBorderWidth: 4
};

window.chartColors = {
    "income": {
        pointBorderColor: "rgba(39,174,96,0.5)",
        borderColor: "#27AE60"
    },
    "expense": {
        pointBorderColor: "rgba(231,76,60,0.5)",
        borderColor: "#E74C3C"
    }
}