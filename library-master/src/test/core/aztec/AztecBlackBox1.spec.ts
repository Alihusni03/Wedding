/*
 * Copyright 2008 ZXing authors
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

// package com.google.zxing.aztec;

// import com.google.zxing.BarcodeFormat;
import { BarcodeFormat } from '@zxing/library';
// import com.google.zxing.common.AbstractBlackBoxTestCase;
import AbstractBlackBoxSpec from '../common/AbstractBlackBox';

import { AztecCodeReader } from '@zxing/library';

/**
 * @author David Olivier
 */
export /*public final*/ class AztecBlackBox1TestCase extends AbstractBlackBoxSpec {

  public constructor() {
    super('src/test/resources/blackbox/aztec-1', new AztecCodeReader(), BarcodeFormat.AZTEC);
    this.addTest(13, 13, 0.0);
    this.addTest(13, 13, 90.0);
    this.addTest(13, 13, 180.0);
    this.addTest(13, 13, 270.0);
  }

}

describe('AztecBlackBox.1', () => {
    it('testBlackBox', async () => {
        const test = new AztecBlackBox1TestCase();
        await test.testBlackBox();
    });
});