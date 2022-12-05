insert into stories values
('Une histoire de livre...',"Nous sommes en 2150 et le monde a indéniablement changé... En effet, maintenant les pompiers n'éteignent pas les incendies, ne sauvent plus les châtons. Ils brûlent des livres. <br/> Incarnez Guy Montag, un pompier en pleine introspective qui cherche à échapper à ce monde où la culture est devenue crime.", "CHIMBAULT Thomas", 2022, 'pompier.jpeg', 0, 0, 0);

insert into scenario values
(1, 1, "Vous êtes appelé pendant une nuit humide de novembre. 'PLUS VITE !' hurle le chef de la caserne. Aussitôt, vous embarquez dans votre camion et arrivez sur le site. Par malheur, vous tombez chez une vieille femme, veuve... Elle scande que la lecture est son seul échappatoire face à la douleur de la perte de son mari
", 'Que faites-vous ?', 1, 2),
(1,2, "La vieille femme hurle de douleur et vous maudit sur plusieurs générations. Vous êtes accusé de monstre qui s'est perdu dans les nouveaux dogmes de société bien triste. Soudain, la vieille femme dérape : elle attrape son couteau de cuisine et s'approche avec motivation de votre coéquipier. 
 ", 'Maîtrisez la pauvre femme ou la laisser tuer ce collègue, que vous considérez vous-même comme un monstre', 3, 4),
(1, 3, "Une fois sur le peloton d'exécution, vos dernières pensées sont pour vos proches et cette femme que vous ne vouliez pas assassiner. ", 'PERDU', null, null),
(1,4, "Vous rentrez à la caserne et faites comme si de rien n'était. Lorsque l'on vous demande, vous hésitez longuement à votre version... 
", 'Que dire ?', 6, 7),
(1,5,  "Vous êtes désormais arrivé chez vous. En quelques instants, vous attrapez vos bagages, votre femme et décidez de partir loin... Si loin que les livres seront de nouveau autorisés
", 'Où aller ?', 8, 9),
(1,6,  "A votre plus grande surprise, vous êtes récompensé... Tout le monde semble d'accord avec vous : il faut protéger les livres.
", 'GAGNÉ', null, null),
(1,7,  "Vous êtes executé sur le champ.", 'PERDU', null, null),
(1,8,  "Malheur, les autorités locales sont déjà tenu au courant votre casere, vous êtes destiné à errer dans les rues, faute de salaire. ", 'PERDU', null, null),
(1,9,"Vous trouvez une nouvelle terre où vous vous sentez bien. Vous vous installez ici. Que vous y êtes bien ! Quelques mois plus tard, vous apprenez que votre femme va avoir un enfant... Quelle belle fin !", 'GAGNÉ', null,null),
(1,10, "Vous vous faites rattrapés. Votre femme, votre enfant et vous sont plongés dans un camp d'internement pour trop de temps. Et là-bas, les livres ne sont pas autorisés... ", 'PERDU', null, null);

insert into solution values
( 1,1, "Vous brûlez ses livres, sans émotion et repartez accompagné d'un intense regret qui vous ronge.", 2),
( 1,2,  "Vous ne brûlez que quelques livres et cachez les restants dans le placard de la cuisine.", 3),
( 1,3, "Vous vous jettez sur la dame et la tuer. Dans un monde où la vie a toujours autant de valeur, vous êtes condamné à l'exécution", 4),
( 1,4,  "Vous décidez de vous enfuir.",  5),
( 1,5,  "Vous fuyez.",  6),
( 1,6, "Vous dites la stricte vérité.", 7),
( 1,7, "Vous mentez ouvertement.", 8),
( 1,8, "Vous partez au Sud.", 9),
( 1,9,  "Vous partez au Nord.", 10);
