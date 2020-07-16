var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'Express' });
});
router.get('/shop', function(req, res, next) {
  res.render('index', { title: 'Shop' });
});
router.get('/tickets', function(req, res, next) {
  res.render('index', { title: 'Tickets' });
});
router.get('/stats', function(req, res, next) {
  res.render('index', { title: 'Stats' });
});

module.exports = router;
