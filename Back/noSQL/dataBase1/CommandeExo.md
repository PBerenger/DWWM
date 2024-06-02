=========================================================================================
                             Exercices NoSQL - World
=========================================================================================

1. Déterminer le nombre exact de pays
db.pays.countDocuments()


2. Lister les différents continents
db.pays.distinct("Continent")


3. Lister les informations de la France
db.pays.find({ "Code": "FRA" })         => si selection de plusieur pays
    ou
db.pays.findOne({ "Name": "France" })   => si selection d'un seul pays


4. Lister les pays du continent européen, ayant une population inférieure à 100000
habitants
db.getCollection('pays').find({"Continent": "Europe", "Population":{$lt : 100000}})


5. Lister les pays indépendants du continent océanique
db.pays.find({"Continent": "Oceania", IndepYear : {$ne : "NA"}})


6. Quel est le plus gros continent en terme de surface ? (Un seul continent affiché à la
fin)
db.pays.aggregate([{ $group: { _id: "$Continent", totalSurface: {$sum:"$SurfaceArea"}}},{$sort: {totalSurface: -1} },{$limit: 1}])


7. Donner par continents le nombre de pays, la population totale et en bonus le nombre
de pays indépendant
db.pays.aggregate([{$group: {_id: "$Continent",totalPays: { $sum: 1 },populationTotale: { $sum: "$Population" },paysIndependants: {$sum: { $toInt: { $ne: ["$IndepYear", "NA"]}}}}}])


8. Donner la population totale des villes de France
db.pays.aggregate( { $match: { Name: { $eq: "France" } } }, { $unwind: "$Cities" }, { $group : { _id:'France', Somme: { $sum: "$Cities.Population" } } })
    ou
db.pays.findOne({ "Code": "FRA" }).Population


9. Donner la capitale (uniquement nom de la ville et population) de France
db.pays.findOne({ "Name": "France" }, { "Capital.Name": 1, "Capital.Population": 1, "_id": 0 })


10. Quelles sont les langues parlées dans plus de 15 pays ?
db.pays.aggregate([{ $unwind: "$OffLang" }, { $group: { _id: "$OffLang.Language", Count: { $count: {} } } }, { $sort: { Count: -1 } }, { $match: { Count: { $gt: 15 } } }])