const labels = Object.keys(chartData);
const produits = [...new Set(Object.values(chartData).flatMap(m => Object.keys(m)))];

const morrisData = labels.map(mois => {
    const moisData = { y: mois };
    produits.forEach(p => {
        moisData[p] = chartData[mois][p] ?? 0;
    });
    return moisData;
});
