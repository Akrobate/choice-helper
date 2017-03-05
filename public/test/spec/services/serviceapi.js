'use strict';

describe('Service: serviceapi', function () {

  // load the service's module
  beforeEach(module('choiceHelperApp'));

  // instantiate service
  var serviceapi;
  beforeEach(inject(function (_serviceapi_) {
    serviceapi = _serviceapi_;
  }));

  it('should do something', function () {
    expect(!!serviceapi).toBe(true);
  });

});
