INSERT INTO `acl` (
`id_group`,
`access` ,
`module` ,
`action` ,
`created`
)
VALUES

(0,'public', 'game', 'getitems', NOW()),
(0,'public', 'game', 'getresults', NOW()),
(0,'public', 'game', 'play', NOW()),

(0,'public', 'users', 'login', NOW()),
(0,'public', 'users', 'suscribe', NOW()),
(0,'public', 'users', 'access', NOW()),
(0,'public', 'users', 'logout', NOW()),
(0,'public', 'users', 'add', NOW()),

(1, 'granted', 'users', 'myself', NOW()),
(1, 'granted', 'users', 'index', NOW()),

(1,'granted', 'users', 'getskills', NOW()),
(1,'granted', 'users', 'addskill', NOW()),
(1,'granted', 'users', 'removeskill', NOW()),

(1,'granted', 'users', 'getlocations', NOW()),
(1,'granted', 'users', 'addlocation', NOW()),
(1,'granted', 'users', 'removelocation', NOW()),
(1,'granted', 'users', 'getinfos', NOW()),
(1,'granted', 'users', 'setinfos', NOW()),

(1,'granted', 'testitem', 'save', NOW()),
(1,'granted', 'testitem', 'index', NOW()),
(1,'granted', 'testitem', 'delete', NOW()),
(1,'granted', 'testitem', 'view', NOW()),

(1,'granted', 'collections', 'save', NOW()),
(1,'granted', 'collections', 'index', NOW()),
(1,'granted', 'collections', 'delete', NOW()),
(1,'granted', 'collections', 'view', NOW())

;
